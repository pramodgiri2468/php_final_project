<?php
session_start(); // Start the session

// Assuming you have a variable $username that contains the user's name
// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // User is logged in, render the welcome message
    $welcomeMessage = "Welcome, $username!";
} else {
    // User is not logged in, render a generic welcome message
    $welcomeMessage = "Welcome to the Online Tutor!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    
    
</head>
<body>
    <div class="container">
        <h1>Welcome to the Online Tutor!</h1>
        <p class="welcome-message"><?php echo $welcomeMessage; ?></p>

        <!-- Add the delete account button -->
        <form action="delete_account.php" method="post">
            <button class="delete-account-btn" type="submit">Delete Account</button>
        </form>
    </div>
</body>
</html>
