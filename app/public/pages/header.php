<?php
$base_url = '/';
?>

<header>
    <div class="container">

        <h1><a href="http://127.0.0.1/index.php">CV-land</a>

        <?php if (isset($_SESSION['isLoggedIn']) &&  $_SESSION['isLoggedIn']): ?>
            - <?php echo $_SESSION['name']; ?>
        <?php endif; ?>
    
        </h1>
        
        <nav>
            <ul>
                <li><a href="<?php echo $base_url; ?>index.php">Home</a></li>
                <?php if (isset($_SESSION['isLoggedIn']) &&  $_SESSION['isLoggedIn']): ?>
                    <li><a href="<?php echo $base_url; ?>pages/logout.php">Log out</a></li>
                    <li><a href="<?php echo $base_url; ?>pages/profile.php">Profile</a></li>
                <?php else: ?>
                    <li><a href="<?php echo $base_url; ?>pages/login.php">Login</a></li>
                    <li><a href="<?php echo $base_url; ?>pages/signUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

