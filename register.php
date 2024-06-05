<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
    
        
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
