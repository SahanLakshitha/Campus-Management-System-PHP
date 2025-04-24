<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];

    $stmt = $pdo->prepare("SELECT * FROM students WHERE nic LIKE ? OR name LIKE ?");
    $stmt->execute(["%$search%", "%$search%"]);
    $students = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Search for a Student</h2>
    <form method="POST">
        <label>Search by NIC or Name</label>
        <input type="text" name="search" required>
        <button type="submit">Search</button>
    </form>

    <?php if (isset($students)) { ?>
        <table>
            <tr>
                <th>NIC</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Course</th>
            </tr>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?php echo $student['nic']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['address']; ?></td>
                    <td><?php echo $student['phone']; ?></td>
                    <td><?php echo $student['course']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>
</html>
