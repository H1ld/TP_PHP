<?php
include 'data/data.php';

include 'actions/handleDB.php';
?>
<?php if (isset($_SESSION['LoggedInUserIndex']) && $users[$_SESSION['LoggedInUserIndex']]->isAdmin()): 
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV-land - db</title>
        <link rel="stylesheet" href="../assets/styles/styles.css">
    </head>
    <body>
        
        <?php include 'pages/includes/header.php' ?>

        <main class="container">
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Admin</th>
                </tr>
                <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($index); ?></td>
                    <td><?php echo htmlspecialchars($user->getUsername()); ?></td>
                    <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
                    <td><?php echo htmlspecialchars($user->getPassword()); ?></td>
                    <td><?php echo htmlspecialchars($user->isAdmin()); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>


            <form action="" method="post" style="display:block">
            
            <label for="setAdmin">Set user admin using ID:</label>
            <input type="number" id="setAdmin" name="setAdmin" min="0" max="<?php echo count($users)-1?>" required>
            
            <button type="submit" value="Login" class="btn">Set admin</button>
            </form>


            <form action="" method="post" style="display:block">
            
            <label for="deleteUser">Delete user using ID:</label>
            <input type="number" id="deleteUser" name="deleteUser" min="0" max="<?php echo count($users)-1?>" required>
            
            <button type="submit" value="Login" class="btn">Delete user</button>
            </form>
        </main>
        
        <?php include 'pages/includes/footer.php' ?>

    </body>
    </html>
<?php else: header("Location: index.php"); ?>
<?php endif; ?>