<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($users as $index => $user){
        if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()) {
            $_SESSION['LoggedInUserIndex'] = $index;
            if (!isset($_SESSION['UserProfileIndex'])){
                $_SESSION['UserProfileIndex'] = $index;
            }

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