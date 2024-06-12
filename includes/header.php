<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Tutor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php
    session_start();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="path_to_logo_image" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tutor</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <?php if (isset($_SESSION['username'])): ?>
                        
                        <li class="nav-item">
                            <form action="logout.php" method="post">
                                <button class="btn btn-outline-danger" type="submit">Logout</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning" href="signup.php">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
