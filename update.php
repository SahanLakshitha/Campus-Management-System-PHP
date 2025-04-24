<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $stmt = $pdo->prepare("UPDATE students SET name = ?, address = ?, phone = ?, course = ? WHERE nic = ?");
    $stmt->execute([$name, $address, $phone, $course, $nic]);

    echo "Student details updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Update Student Details</h2>
    <form method="POST">
        <label>NIC</label>
        <input type="text" name="nic" required>
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Address</label>
        <input type="text" name="address" required>
        <label>Phone</label>
        <input type="text" name="phone" required>
        <label>Course</label>
        <input type="text" name="course" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
