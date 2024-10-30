<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['UserProfileIndex'])){
        $_SESSION['UserProfileIndex'] = $_POST['UserProfileIndex'];
        header("Location: pages/profile.php");
    }
}
?>