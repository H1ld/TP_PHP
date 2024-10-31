<?php

include '../data/data.php';

include '../actions/handleCV.php';
?>
<?php if (isset($_SESSION['UserProfileIndex'])): 
    $user = $users[$_SESSION['UserProfileIndex']];
    $userCV = $user->getCV();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV-land - CV</title>
        <link rel="stylesheet" href="../assets/styles/styles.css">
    </head>
    <body>

        <?php include 'includes/header.php' ?>

        <main class="container">
            <h1><?php echo $user->getUsername();?>'s CV</h1>
            
            <?php if (isset($_SESSION['UserProfileIndex']) && isset($_SESSION['LoggedInUserIndex']) && ($_SESSION['UserProfileIndex'] == $_SESSION['LoggedInUserIndex'] || $users[$_SESSION['LoggedInUserIndex']]->isAdmin())): ?>
                <button id="edit-cv-btn" class="btn">Edit CV</button>
            <?php endif; ?>

            <section class="cv-section">
                <h2>Personal Information</h2>
                <p><strong>Name:</strong> <span id="cv-name"> <?php if (isset($userCV)) : echo $userCV->getName(); endif?> </span></p>
                <p><strong>Email:</strong> <span id="cv-email"> <?php if (isset($userCV)) : echo $userCV->getEmail(); endif?> </span></p>
                <p><strong>Phone:</strong> <span id="cv-phone"> <?php if (isset($userCV)) : echo $userCV->getPhone(); endif?> </span></p>
                <p><strong>Address:</strong> <span id="cv-address"> <?php if (isset($userCV)) : echo $userCV->getAddress(); endif?> </span></p>
            </section>

            <section class="cv-section">
                <h2>Skills</h2>
                <ul id="cv-skills" class="cv-list">
                    <?php if (isset($userCV)) : echo $userCV->getskills(); endif?>
                </ul>
            </section>

            <section class="cv-section">
                <h2>Languages</h2>
                <ul id="cv-languages" class="cv-list">
                    <?php if (isset($userCV)) : echo $userCV->getlanguages(); endif?>
                </ul>
            </section>

            <a href="profile.php" class="btn">Back to Profile</a>
        </main>

        <?php if (isset($_SESSION['UserProfileIndex']) && isset($_SESSION['LoggedInUserIndex']) && ($_SESSION['UserProfileIndex'] == $_SESSION['LoggedInUserIndex'] || $users[$_SESSION['LoggedInUserIndex']]->isAdmin())): ?>
            <div id="edit-cv-popup" class="popup">
                <div class="popup-content">
                    <span class="close">&times;</span>
                    <h2>Edit CV</h2>
                    <form id="edit-cv-form" action="" method="post">
                        <label for="edit-name">Name:</label>
                        <input type="text" id="edit-name" name="edit-name" value="<?php if (isset($userCV)) : echo $userCV->getName(); endif?>" required>

                        <label for="edit-email">Email:</label>
                        <input type="email" id="edit-email" name="edit-email" value="<?php if (isset($userCV)) : echo $userCV->getEmail(); endif?>" required>

                        <label for="edit-phone">Phone:</label>
                        <input type="tel" id="edit-phone" name="edit-phone" value="<?php if (isset($userCV)) : echo $userCV->getPhone(); endif?>" required>

                        <label for="edit-address">Address:</label>
                        <input type="text" id="edit-address" name="edit-address" value="<?php if (isset($userCV)) : echo $userCV->getAddress(); endif?>" required>

                        <label for="edit-skills">Skills:</label>
                        <input id="edit-skills" name="edit-skills" value = "<?php if (isset($userCV)) : echo $userCV->getskills(); endif?>"></input>

                        <label for="edit-languages">Languages:</label>
                        <input id="edit-languages" name="edit-languages" value="<?php if (isset($userCV)) : echo $userCV->getlanguages(); endif?>"></input>

                        <button type="submit" class="btn">Save Changes</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <?php include 'includes/footer.php' ?>

        <script>
            const editCvBtn = document.getElementById('edit-cv-btn');
            const editCvPopup = document.getElementById('edit-cv-popup');
            const closePopup = document.querySelector('.close');
            const editCvForm = document.getElementById('edit-cv-form');
            const addSkillBtn = document.getElementById('add-skill');
            const skillNameInput = document.getElementById('skill-name');
            const skillExperienceInput = document.getElementById('skill-experience');
            const editSkillsList = document.getElementById('edit-skills');
            const addLanguageBtn = document.getElementById('add-language');
            const languageNameInput = document.getElementById('language-name');
            const languageProficiencyInput = document.getElementById('language-proficiency');
            const editLanguagesList = document.getElementById('edit-languages');

            editCvBtn.addEventListener('click', () => {
                editCvPopup.style.display = 'flex';
            });

            closePopup.addEventListener('click', () => {
                editCvPopup.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === editCvPopup) {
                    editCvPopup.style.display = 'none';
                }
            });
        </script>
    </body>
    </html>
<?php else: header("Location: ../index.php"); ?>
<?php endif; ?>