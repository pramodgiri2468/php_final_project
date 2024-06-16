<head>
    <title>Welcome to Online Tutor Platform</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav>
        <label class="logo">E-Learning</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="tutor.php">Tutor</a></li>
            <li><a href="about.php">About</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li>
                    <form action="logout.php" method="post">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            <?php else: ?>
                <li><a href="login.php" class="btn btn-success">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php endif; ?>
    </nav>
