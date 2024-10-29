<?php
include 'data/data.php';
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
    <?php include 'pages/includes/header.php' ?>

    <main class="container">
        <h1>Welcome to CV Hub</h1>
        <p>Showcase your skills and projects.</p>
        
        <section>
            <h2>Featured CVs</h2>
            <div class="featured-cvs">
                <?php foreach ($users as $index => $user): ?>
                    <div class="cv-card">
                        <h3><?php echo $user->getUsername(); ?></h3>
                        <p><?php echo $user->getEmail(); ?></p>
                        <a href="pages/profile.php" class="btn">View Profile</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <a href="signup.html" class="btn">Get Started</a>
    </main>

    <?php include 'pages/includes/footer.php' ?>

</body>
</html>