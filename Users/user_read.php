<?php
include '../includes/db_connect.php';

function getUsers() {
    global $pdo;
    $sql = "SELECT * FROM User";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$users = getUsers();

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
