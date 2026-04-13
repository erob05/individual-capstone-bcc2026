<?php require '../../config/config.php';?>
<?php require '../../views/partials/header.php'; ?>
<main id="main">
    <div class="user-form text-focus-in">
        <h2>Log into your Account</h2>
        <form>
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