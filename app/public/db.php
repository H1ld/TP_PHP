<?php
include 'data/data.php';
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
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Admin</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->getUsername()); ?></td>
                <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
                <td><?php echo htmlspecialchars($user->getPassword()); ?></td>
                <td><?php echo htmlspecialchars($user->isAdmin()); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <br>
        <br>

        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo htmlspecialchars($project->getName()); ?></td>
                <td><?php echo htmlspecialchars($project->getDescription()); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </main>

    <?php include 'pages/includes/footer.php' ?>

</body>
</html>