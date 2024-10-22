<?php
include '../data/data.php';

include '../actions/handleLogIn.php';
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
    
    <?php include 'includes/header.php' ?>

    <main class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" value="Login" class="btn">Login</button>
        </form>

        <?php if (isset($error)): ?>
            <p id="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <p>Don't have an account? <a href="signup.html">Sign up</a></p>

    </main>

    <?php include 'includes/footer.php' ?>

</body>
</html>