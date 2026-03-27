<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERIC ROBERTS - WEB DEVELOPER</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1 id="h1">ERIC ROBERTS</h1>
        <p id="p">full-stack web developer</p>
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="nav" id="nav">
                <p><a href="<?= BASE_URL ?>index.php">Home</a></p>
                <p><a>Portfolio</a></p>
                <p><a>Login</a></p>
                <p><a href="<?= BASE_URL ?>user_manager/create-form.php">Create an Account</a></p>
        </nav>
    </header>