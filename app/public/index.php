<?php

// Start session 
session_start();


// Sets default variable values if session is not set
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "defaultName";
    $_SESSION['email'] = "defaultMail";
}

// Modifies variable when form is sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/styles/landingPage.css">
</head>
<body>
    <H1> Hello <?php echo $_SESSION['name']; ?> </h1>
    <p> Email: <?php echo $_SESSION['email']; ?> </p>

    <br>
    <br>

    <h2>Edit</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <input type="submit" value="Save Changes">
    </form>
</body>
</html>