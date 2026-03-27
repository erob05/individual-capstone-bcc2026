<?php require '../config/config.php';?>
<?php require '../views/partials/header.php'; ?>
<main id="main">
    <div class="create-form">
        <h2>Create an Account</h2>
        <form>
            <label>Email: </label><input type="text">
            <br><br>
            <label>Pass: </label><input type="password">
            <br><br>
            <input type="submit" value="Finalize">
        </form>
    </div>
</main>
<?php require '../views/partials/footer.php'; ?>