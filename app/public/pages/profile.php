<?php

include '../data/data.php';

include '../actions/handleProfile.php';

// Sets default variable values if session is not set
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "defaultName";
    $_SESSION['email'] = "defaultMail";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Hub - Profile</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>
    <?php include 'includes/header.php' ?>

    <main class="container">
        <h1>Your Profile</h1>
        
        <section>
            <h2>Personal Information</h2>
            <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Profession:</strong> Software Developer</p>
        </section>
        
        <section>
            <h2>Your Projects</h2>
            <button id="add-project-btn" class="btn">Add New Project</button>
            <ul class="project-list">

                <?php foreach ($projects as $index => $project): ?>
                    <li class="project-item">
                        <div class="project-content">
                            <h3><?php echo $project->getName(); ?></h3>
                            <p><?php echo $project->getDescription(); ?></p>
                        </div>

                        <form method="post">
                            <input type="hidden" name="removeProject" value="<?php echo $index; ?>">
                            <button type="submit" class="delete-btn">Remove</button>
                        </form>

                    </li>
                <?php endforeach; ?>

            </ul>
        </section>
    </main>

    <div id="add-project-popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Add New Project</h2>
            <form id="add-project-form" method="POST">
                <label for="projectName">Project Name:</label>
                <input type="text" id="projectName" name="projectName" value="" required>
                
                <label for="projectDescription">Project Description:</label>
                <textarea id="projectDescription" name="projectDescription" value="" required></textarea>
                
                <button type="submit" class="btn">Add Project</button>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>

    <script src="/assets/js/profile.js"></script> 
</body>
</html>