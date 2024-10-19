<?php

// Start session 
session_start();

$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];


// Sets default variable values if session is not set
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "defaultName";
    $_SESSION['email'] = "defaultMail";
}

// Modifies variable when form is sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Hub - Home</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
    <?php include 'pages/header.php' ?>

    <main class="container">
        <h1>Welcome to CV Hub</h1>
        <p>Showcase your skills and projects to potential employers.</p>
        
        <section>
            <h2>Featured CVs</h2>
            <div class="featured-cvs">
                <div class="cv-card">
                    <h3>John Doe 1</h3>
                    <p>Software Developer</p>
                    <a href="pages/profile.php" class="btn">View Profile</a>
                </div>
                <div class="cv-card">
                    <h3>John Doe 2</h3>
                    <p>Software Developer</p>
                    <a href="pages/profile.php" class="btn">View Profile</a>
                </div>
                <div class="cv-card">
                    <h3>John Doe 3</h3>
                    <p>Software Developer</p>
                    <a href="pages/profile.php" class="btn">View Profile</a>
                </div>
            </div>
        </section>
        
        <a href="signup.html" class="btn">Get Started</a>
    </main>

    <?php include 'pages/footer.php' ?>

</body>
</html>