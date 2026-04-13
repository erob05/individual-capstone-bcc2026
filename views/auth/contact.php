<?php require '../../config/config.php';?>
<?php require '../../views/partials/header.php'; ?>
    <main id="main">
        <a href="#" id="log-link">Log Out</a>
        <div class="contact-form">
            <h2>Contact Me</h2>
            <form>
                <div class="form-grid">
                    <label for="subject">Subject: </label><input id="subject" type="text" name="subject">
                    <br><br>
                    <label for="message">Message: </label><textarea name="message" name="message"></textarea>
                    <br><br>
                </div>
                <input class="submit" type="submit" value="Send" class="submit">
            </form>
        </div>
    </main>
<?php require '../../views/partials/footer.php'; ?>