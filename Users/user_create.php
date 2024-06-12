<?php
include '../includes/db_connect.php';


if(isset($_POST[])) {

    $sql = "INSERT INTO User (username, password, email, is_teacher) VALUES (:username, :password, :email, :is_teacher)";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT), 'email' => $email, 'is_teacher' => $is_teacher]);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['is_teacher']);
    header("Location: user_read.php");
}

include '../includes/header.php';
?>

<h1>Create User</h1>
<form method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="is_teacher" class="form-label">Is Teacher</label>
        <select class="form-control" id="is_teacher" name="is_teacher">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?php
include '../includes/footer.php';
?>
