<?php
    include '../data/data.php';

    include '../actions/handleSignUp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-land - Sign Up</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>

    <?php include 'includes/header.php' ?>

    <main class="container">
        <h1>Sign Up</h1>
        <form method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required
                value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>"> <!--keeps the values from the previous form-->
                
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required 
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"> <!--keeps the values from the previous form-->
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <?php if (isset($error)): ?>
                <p id="error"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.html">Login</a></p>

    </main>

    <?php include 'includes/footer.php' ?>

</body>
</html>