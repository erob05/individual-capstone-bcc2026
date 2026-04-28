<?php
session_start();

require '../../config/db.php';
require '../../controllers/user-controller.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userController = new UserController($pdo);

$userId = $_SESSION['user_id'];

$result = $userController->deleteUser($userId);

if ($result) {
    // destroy session after deletion
    session_unset();
    session_destroy();

    header("Location: success.php?deleted=1");
    exit;
} else {
    echo "Failed to delete account.";
}