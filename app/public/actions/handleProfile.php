<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['projectName']) && isset($_POST['projectDescription'])){

        $users[$_SESSION['UserProfileIndex']]->addProject(new Project($_POST['projectName'], $_POST['projectDescription']));
        saveUsersCookie($users);
        
    } elseif (isset($_POST['removeProject'])) {
        $index = $_POST['removeProject'];
        $users[$_SESSION['UserProfileIndex']]->removeProject($index);
        saveUsersCookie($users);
    }
    header("Refresh:0");
}
?>  