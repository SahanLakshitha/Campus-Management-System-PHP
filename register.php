<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $stmt = $pdo->prepare("INSERT INTO students (nic, name, address, phone, course) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nic, $name, $address, $phone, $course]);

    echo "Student registered successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Register Student</h2>
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
        <button type="submit">Register</button>
    </form>
</body>
</html>
