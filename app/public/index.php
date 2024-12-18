<?php
include 'data/data.php';

include 'actions/handleHome.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-land - Home</title>
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

                        <form class="home-form" method="post">
                            <input type="hidden" name="UserProfileIndex" value="<?php echo $index; ?>">
                            <button type="submit" class="btn home-btn">View Profile</button>
                        </form>
                    
                    
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <a href="pages/signup.php" class="btn">Get Started</a>
    </main>

    <?php include 'pages/includes/footer.php' ?>

</body>
</html>