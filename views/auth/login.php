<?php
session_start();
require '../../config/db.php';
require '../../controllers/user-controller.php';

$userController = new UserController($pdo);

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['pass'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {

        $user = $userController->login($email, $password);

        if ($user) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];

            header("Location: /views/auth/dashboard.php");
            exit;

        } else {
            $error = "Invalid email or password.";
        }
    }
}
require '../../views/partials/header.php';
?>
<main id="main">
    <div class="user-form text-focus-in">
        <h2>Log into your Account</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Email: </label><input type="text" name="email">
            <br><br>
            <label id="i-0">Pass: </label><input type="password" name="pass">
            <br><br>
            <input class="submit" type="submit" value="Login">
        </form>
    </div>
    <p class="login-link">Or <a href="register.php">create one here</a></p>
</main>
<?php require '../../views/partials/footer.php'; ?>