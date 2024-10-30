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
            
            <button id="edit-cv-btn" class="btn">Edit CV</button>

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
                    <li>Web Development (HTML, CSS, JavaScript) - 5 years</li>
                    <li>React.js - 3 years</li>
                    <li>Node.js - 2 years</li>
                    <li>Python - 4 years</li>
                    <li>Database Management (SQL, MongoDB) - 3 years</li>
                    <li>Version Control (Git) - 5 years</li>
                    <li>Agile Methodologies - 2 years</li>
                </ul>
            </section>

            <section class="cv-section">
                <h2>Languages</h2>
                <ul id="cv-languages" class="cv-list">
                    <li>English - Native</li>
                    <li>Spanish - Fluent</li>
                    <li>French - Intermediate</li>
                    <li>German - Basic</li>
                </ul>
            </section>

            <a href="profile.html" class="btn">Back to Profile</a>
        </main>

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

                    <h3>Skills</h3>
                    <div class="skills-input">
                        <input type="text" id="skill-name" placeholder="Skill name" name="skill-name" value="">
                        <input type="text" id="skill-experience" placeholder="Experience" name="skill-experience" value="">
                        <button type="button" id="add-skill" class="btn">Add Skill</button>
                    </div>
                    <ul id="edit-skills" class="skills-list"></ul>

                    <h3>Languages</h3>
                    <div class="languages-input">
                        <input type="text" id="language-name" placeholder="Language name" name="language-name" value="">
                        <input type="text" id="language-proficiency" placeholder="Proficiency" name="language-proficiency" value="">
                        <button type="button" id="add-language" class="btn">Add Language</button>
                    </div>
                    <ul id="edit-languages" class="languages-list"></ul>

                    <button type="submit" class="btn">Save Changes</button>
                </form>
            </div>
        </div>

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
                
                // Populate skills list
                editSkillsList.innerHTML = '';
                Array.from(document.getElementById('cv-skills').children).forEach(li => {
                    const [skill, experience] = li.textContent.split(' - ');
                    addSkillToList(skill, experience);
                });

                // Populate languages list
                editLanguagesList.innerHTML = '';
                Array.from(document.getElementById('cv-languages').children).forEach(li => {
                    const [language, proficiency] = li.textContent.split(' - ');
                    addLanguageToList(language, proficiency);
                });
            });

            closePopup.addEventListener('click', () => {
                editCvPopup.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === editCvPopup) {
                    editCvPopup.style.display = 'none';
                }
            });

            addSkillBtn.addEventListener('click', () => {
                const skillName = skillNameInput.value.trim();
                const skillExperience = skillExperienceInput.value.trim();
                if (skillName && skillExperience) {
                    addSkillToList(skillName, skillExperience);
                    skillNameInput.value = '';
                    skillExperienceInput.value = '';
                }
            });

            addLanguageBtn.addEventListener('click', () => {
                const languageName = languageNameInput.value.trim();
                const languageProficiency = languageProficiencyInput.value.trim();
                if (languageName && languageProficiency) {
                    addLanguageToList(languageName, languageProficiency);
                    languageNameInput.value = '';
                    languageProficiencyInput.value = '';
                }
            });

            function addSkillToList(name, experience) {
                const li = document.createElement('li');
                li.className = 'skill-item';
                li.innerHTML = `
                    <span>${name} - ${experience}</span>
                    <button type="button" class="btn remove-skill">Remove</button>
                `;
                li.querySelector('.remove-skill').addEventListener('click', () => li.remove());
                editSkillsList.appendChild(li);
            }

            function addLanguageToList(name, proficiency) {
                const li = document.createElement('li');
                li.className = 'language-item';
                li.innerHTML = `
                    <span>${name} - ${proficiency}</span>
                    <button type="button" class="btn remove-language">Remove</button>
                `;
                li.querySelector('.remove-language').addEventListener('click', () => li.remove());
                editLanguagesList.appendChild(li);
            }

            editCvForm.addEventListener('submit', function(e) {
                
                const skillsList = document.getElementById('cv-skills');
                skillsList.innerHTML = Array.from(editSkillsList.children)
                    .map(li => `<li>${li.querySelector('span').textContent}</li>`)
                    .join('');

                const languagesList = document.getElementById('cv-languages');
                languagesList.innerHTML = Array.from(editLanguagesList.children)
                    .map(li => `<li>${li.querySelector('span').textContent}</li>`)
                    .join('');

                editCvPopup.style.display = 'none';
            });
        </script>
    </body>
    </html>
<?php else: header("Location: ../index.php"); ?>
<?php endif; ?>