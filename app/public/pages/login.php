<?php
include '../data/data.php';

// Check if the form is submitted
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

        <?php if (isset($error)): ?>
            <p id="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <p>Don't have an account? <a href="signup.html">Sign up</a></p>


        
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->getUsername()); ?></td>
                <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </main>

    <?php include 'footer.php' ?>

</body>
</html>