<header>
    <div class="container">

        <h1><a href="http://127.0.0.1/index.php">CV-land</a>

        <?php if (isset($_SESSION['isLoggedIn']) &&  $_SESSION['isLoggedIn']): ?>
            - <?php echo $_SESSION['name']; ?>
        <?php endif; ?>
    
        </h1>
        
        <nav>
            <ul>
                <?php if (isset($_SESSION['isAdmin']) &&  $_SESSION['isAdmin']): ?>
                    <li><a href="/db.php">data</a></li>
                <?php endif; ?>
                <li><a href="/index.php">Home</a></li>
                <?php if (isset($_SESSION['isLoggedIn']) &&  $_SESSION['isLoggedIn']): ?>
                    <li><a href="/actions/logout.php">Log out</a></li>
                    <li><a href="/pages/profile.php">Profile</a></li>
                <?php else: ?>
                    <li><a href="/pages/login.php">Login</a></li>
                    <li><a href="/pages/signUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

