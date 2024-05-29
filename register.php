<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            <label for="is_teacher">Are you a teacher?</label>
            <input type="checkbox" id="is_teacher" name="is_teacher"><br><br>
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </div>

    <?php
require_once 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_teacher = isset($_POST['is_teacher']) ? 1 : 0;

    if ($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $query = "INSERT INTO user (username, password, email, is_teacher) VALUES (?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'sssi', $username, $hashed_password, $email, $is_teacher);
            if (mysqli_stmt_execute($stmt)) {
                // Registration successful
                echo 'Registration successful. <a href="index.php">Login here</a>';
            } else {
                echo 'Registration failed. Please try again.';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo 'Database query failed';
        }
    } else {
        echo 'Passwords do not match';
    }

    mysqli_close($conn);
}
?>

</body>
</html>
