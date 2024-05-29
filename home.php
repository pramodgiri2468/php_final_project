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
    <style>
        /* CSS Styles for the landing page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .delete-account-btn {
            background-color: #ff4d4d;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-account-btn:hover {
            background-color: #ff3333;
        }
    </style>
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
