<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['setAdmin'])){
        $users[$_POST['setAdmin']]->setAdmin(TRUE);
        saveUsersCookie($users);
        header("Refresh:0");
    } else if (isset($_POST['deleteUser'])){
        $index = $_POST['deleteUser'];
        if (isset($users[$index])) {
            array_splice($users, $index, 1);
          }
        saveUsersCookie($users);
        header("Refresh:0");
    }
}
?>