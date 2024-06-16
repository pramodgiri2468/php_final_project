<?php
include '../includes/db_connect.php';
echo $_SESSION['is_teacher'];

if(isset($_session['is_teacher']) && $_session['is_teacher'] == 'Student') {

}else{
    header('Location: ../index.php');
    exit;
}

function getUsers($conn) {
    $sql = "SELECT * FROM User";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error: " . $conn->error);
    }

    // Fetch all users
    return $result->fetch_all(MYSQLI_ASSOC);
}

$users = getUsers($conn);

include '../includes/header.php';
?>

<h1>Users</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Is Teacher</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['is_teacher']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../includes/footer.php';
?>
