<?php
session_start();
require '../../config/config.php';
require '../../config/db.php';
require '../../controllers/project-controller.php';

$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = $_SESSION['is_admin'] ?? 0;

if (!$isLoggedIn) {
    $headerFile = '../../views/partials/header.php';
} else {
    $headerFile = $isAdmin
        ? '../../views/partials/header-admin.php'
        : '../../views/partials/header-user.php';
}

require $headerFile;

$controller = new ProjectController($pdo);
$projects = $controller->getAll();
?>
<main id="main">
    <div class="portfolio text-focus-in">

        <?php foreach ($projects as $project): ?>
            <div class="card" style="background-image: url('<?= BASE_URL ?>public/<?= $project['image_url'] ?>');">
                <p>
                    <a href="<?= $project['github_url'] ?>" target="_blank" style="color:white; text-decoration:none;">
                        <?= htmlspecialchars($project['title']) ?>
                    </a>
                </p>
            </div>
        <?php endforeach; ?>

    </div>
</main>
<?php require '../../views/partials/footer.php'; ?>