<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Add your custom CSS styles here */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Account</h2>
        <p>Please enter your username and password to delete your account.</p>
        <form method="POST" action="delete_account.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="hidden" name="confirm_delete" value="1">
                <input type="submit" value="Delete Account">
                <input type="button" value="Cancel" onclick="window.location.href='home.php'">
            </div>
        </form>

        <?php
        require_once 'includes/db_connect.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Verify user credentials
            $query = "SELECT * FROM user WHERE username = ?";
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);

                    // Verify password
                    if (password_verify($password, $user['password'])) {
                        // Delete account
                        $deleteQuery = "DELETE FROM user WHERE username = ?";
                        if ($deleteStmt = mysqli_prepare($conn, $deleteQuery)) {
                            mysqli_stmt_bind_param($deleteStmt, 's', $username);
                            if (mysqli_stmt_execute($deleteStmt)) {
                                // Account deletion successful
                                echo '<p style="color: green; text-align: center;">Account deleted successfully. <a href="index.php">Go to Home</a></p>';
                            } else {
                                echo '<p style="color: red; text-align: center;">Account deletion failed. Please try again.</p>';
                            }
                            mysqli_stmt_close($deleteStmt);
                        } else {
                            echo '<p style="color: red; text-align: center;">Database query failed.</p>';
                        }
                    } else {
                        echo '<p style="color: red; text-align: center;">Invalid username or password.</p>';
                    }
                } else {
                    echo '<p style="color: red; text-align: center;">Invalid username or password.</p>';
                }

                mysqli_stmt_close($stmt);
            } else {
                echo '<p style="color: red; text-align: center;">Database query failed.</p>';
            }

            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
