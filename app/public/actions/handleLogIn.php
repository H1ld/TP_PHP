<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($users as $user){
        if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()) {
            $_SESSION['name'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['is_admin'] = $user->isAdmin();
            $_SESSION['isLoggedIn'] = TRUE;

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