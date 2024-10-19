<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Hub - Sign Up</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>

    <?php include 'header.php' ?>

    <main class="container">
        <h1>Sign Up</h1>
        <form action="profile.html" method="get">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </main>

    <?php include 'footer.php' ?>

</body>
</html>