<?php
// Start the session
session_start();

// Hardcoded credentials for the admin user
$adminUsername = "admin";
$adminPassword = "password123";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $adminUsername && $password === $adminPassword) {
        // Set session for admin user
        $_SESSION['is_admin'] = true;
        // Redirect to the CV page
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Hub - Login</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>
    
    <?php include 'header.php' ?>

    <main class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" value="Login" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign up</a></p>
    </main>

    <?php include 'footer.php' ?>

</body>
</html>