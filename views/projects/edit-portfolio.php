<?php
session_start();

require '../../config/db.php';
require '../../controllers/project-controller.php';

if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../../public/index.php");
    exit;
}

$controller = new ProjectController($pdo);

// CREATE
if (isset($_POST['create'])) {
    $controller->create($_POST['title'], $_POST['github'], $_POST['image']);
    header("Location: edit-portfolio.php");
    exit;
}

// DELETE
if (isset($_POST['delete'])) {
    $controller->delete($_POST['id']);
    header("Location: edit-portfolio.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $controller->update(
        $_POST['id'],
        $_POST['title'],
        $_POST['github'],
        $_POST['image']
    );
    header("Location: edit-portfolio.php");
    exit;
}

$projects = $controller->getAll();

require '../../views/partials/header-admin.php';
?>
<main>
    <h2>Create Project</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="github" placeholder="GitHub URL">
        <input type="text" name="image" placeholder="Image URL">
        <button name="create">Create</button>
    </form>
    
    <h2>All Projects</h2>

    <?php foreach ($projects as $project): ?>
        <form method="POST" style="margin-bottom:20px;">
            <input type="hidden" name="id" value="<?= $project['id'] ?>">

            <input type="text" name="title" value="<?= $project['title'] ?>">
            <input type="text" name="github" value="<?= $project['github_url'] ?>">
            <input type="text" name="image" value="<?= $project['image_url'] ?>">

            <button name="update">Update</button>
            <button name="delete" onclick="return confirm('Delete this project?')">Delete</button>
        </form>
    <?php endforeach; ?>
</main>

<?php require '../../views/partials/footer.php'; ?>