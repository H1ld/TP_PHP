<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])){
        if($_POST['password'] == $_POST['confirmPassword']){
            $newUser = new User($_POST['fullname'], $_POST['password'], $_POST['email'], FALSE);
            $users[] = $newUser;
            saveUsersCookie($users);
            header("Location: profile.php");
        } else {
            $error = "Password confirmation does not match!";
        }
    }  
}
?>