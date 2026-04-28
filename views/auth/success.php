<?php
session_start();

require '../../config/config.php';
require '../../views/partials/header.php';

$email = $_SESSION['new_user_email'] ?? null;

unset($_SESSION['new_user_email']);
?>

<?php if (isset($_GET['deleted'])): ?>
    <h2 style="text-align:center;">Your account has been deleted.</h2>
    <style>
        #success { display: none; }
    </style>
<?php endif; ?>

<main id="success">
    <h2>Account Created Successfully</h2>

    <p>Welcome! Your account has been created.</p>

    <?php if ($email): ?>
        <p>
            A confirmation email has been sent to:
            <strong><?= htmlspecialchars($email) ?></strong>
        </p>
    <?php else: ?>
        <p>A confirmation email has been sent.</p>
    <?php endif; ?>

    <p class="link">
        Return to <a href="login.php">Log In</a>
    </p>
</main>

<?php require '../../views/partials/footer.php'; ?>