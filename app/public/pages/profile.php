<?php
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
    <title>CV Hub - Profile</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>
    <?php include 'header.php' ?>

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
                <li class="project-item">
                    <div class="project-content">
                        <h3>Project 1</h3>
                        <p>Description of Project 1</p>
                    </div>
                    <button class="delete-btn">Delete</button>
                </li>
                <li class="project-item">
                    <div class="project-content">
                        <h3>Project 2</h3>
                        <p>Description of Project 2</p>
                    </div>
                    <button class="delete-btn">Delete</button>
                </li>
            </ul>
        </section>
    </main>

    <div id="add-project-popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Add New Project</h2>
            <form id="add-project-form">
                <label for="project-name">Project Name:</label>
                <input type="text" id="project-name" name="project-name" required>
                
                <label for="project-description">Project Description:</label>
                <textarea id="project-description" name="project-description" required></textarea>
                
                <button type="submit" class="btn">Add Project</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php' ?>

    <script>
        const addProjectBtn = document.getElementById('add-project-btn');
        const addProjectPopup = document.getElementById('add-project-popup');
        const closePopup = document.querySelector('.close');

        addProjectBtn.addEventListener('click', () => {
            addProjectPopup.style.display = 'flex';
        });

        closePopup.addEventListener('click', () => {
            addProjectPopup.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === addProjectPopup) {
                addProjectPopup.style.display = 'none';
            }
        });

        document.getElementById('add-project-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('project-name').value;
            const description = document.getElementById('project-description').value;
            
            const projectList = document.querySelector('.project-list');
            const newProject = document.createElement('li');
            newProject.className = 'project-item';
            newProject.innerHTML = `
                <div class="project-content">
                    <h3>${name}</h3>
                    <p>${description}</p>
                </div>
                <button class="delete-btn">Delete</button>
            `;
            projectList.appendChild(newProject);
            
            // Add event listener to the new delete button
            newProject.querySelector('.delete-btn').addEventListener('click', deleteProject);
            
            // Clear form and close popup
            e.target.reset();
            addProjectPopup.style.display = 'none';
        });

        // Function to delete a project
        function deleteProject(e) {
            const projectItem = e.target.closest('.project-item');
            if (projectItem) {
                projectItem.remove();
            }
        }

        // Add event listeners to existing delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', deleteProject);
        });
    </script>
</body>
</html>