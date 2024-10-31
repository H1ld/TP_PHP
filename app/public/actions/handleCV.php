<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['edit-name']) && isset($_POST['edit-email']) && isset($_POST['edit-phone']) && isset($_POST['edit-address']) && isset($_POST['edit-skills']) && isset($_POST['edit-languages'])) {

        $test = new CV($_POST['edit-name'], $_POST['edit-email'], $_POST['edit-phone'], $_POST['edit-address'], $_POST['edit-skills'], $_POST['edit-languages']);
        $users[$_SESSION['UserProfileIndex']]->setCV($test);
        saveUsersCookie($users);
        header("Refresh:0");
    }
}
?>