<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($users as $index => $user){
        if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()) {
            $_SESSION['LoggedInUserIndex'] = $user;

            $found = TRUE;
            break;
        }
    }
    if (!isset($found)) {
        $error = "Invalid username or password!";
    } else {
        header("Location: profile.php");
    }
}
?>