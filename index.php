<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <?php
session_start();
require_once 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform login verification
    $query = "SELECT * FROM user WHERE username = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Login successful
                // Store user information in session
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['is_teacher'] = $user['is_teacher']?'Teacher':"Student";
                // Redirect to the home page or perform any other actions
                header('Location: users/index.php');
                exit;
            } else {
                // Login failed
                echo '<p style="color: red; text-align: center;">Invalid username or password</p>';
            }
        } else {
            // Login failed
            echo '<p style="color: red; text-align: center;">Invalid username or password</p>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<p style="color: red; text-align: center;">Database query failed</p>';
    }

    mysqli_close($conn);
}
?>


</body>
</html>
