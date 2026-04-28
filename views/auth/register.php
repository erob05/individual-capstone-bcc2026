<?php
session_start();

require_once "../../config/db.php";
require_once "../../controllers/user-controller.php";
require_once "../../config/mail.php";

$userController = new UserController($pdo);

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['pass'] ?? '';

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {

        // Create user
        $success = $userController->createUser($email, $password);

        if ($success) {

            // Send confirmation email
            sendConfirmationEmail($email);

            // Store email for success page
            $_SESSION['new_user_email'] = $email;

            // Redirect BEFORE ANY OUTPUT
            header("Location: success.php");
            exit;

        } else {
            $error = "Email already exists.";
        }
    }
}

require "../../views/partials/header.php";
?>
<main id="main">
    <div class="user-form text-focus-in">
        <h2>Create your Account</h2>
        <form method="POST" action="register.php">
            <label>Email: </label><input type="text" name="email">
            <br><br>
            <label id="i-0">Pass: </label><input type="password" name="pass">
            <br><br>
            <input class="submit" type="submit" value="Create Account">
        </form>
    </div>
    <p class="login-link">Or <a href="login.php">log in here</a></p>
</main>
<?php require '../../views/partials/footer.php'; ?>