<?php
session_start();
require '../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "public/index.php");
    exit;
}

$isAdmin = $_SESSION['is_admin'] ?? 0;

$headerFile = $isAdmin
    ? '../../views/partials/header-admin.php'
    : '../../views/partials/header-user.php';

require $headerFile;

// PHPMailer
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($subject) || empty($message)) {
        $error = "All fields are required.";
    } else {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USER;
            $mail->Password = MAIL_PASS;
            $mail->SMTPSecure = 'tls';
            $mail->Port = MAIL_PORT;

            $mail->setFrom(MAIL_USER, 'Portfolio Contact');
            $mail->addAddress(MAIL_USER); // sends to yourself

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            $success = "Message sent successfully!";
        } catch (Exception $e) {
            $error = "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
?>
<main id="main">
    <div class="contact-form">
        <h2>Contact Me</h2>

        <?php if ($success): ?>
            <p style="color:green;"><?= $success ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="form-grid">
                <label for="subject">Subject: </label>
                <input id="subject" type="text" name="subject">

                <label for="message">Message: </label>
                <textarea name="message"></textarea>
            </div>

            <input class="submit" type="submit" value="Send">
        </form>
    </div>
</main>
<?php require '../../views/partials/footer.php'; ?>