<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];// Retrieve the NIC from the submitted form data

    $stmt = $pdo->prepare("DELETE FROM students WHERE nic = ?"); // Prepare an SQL statement to delete the student with the given NIC from the 'students' table
    $stmt->execute([$nic]);// Execute the prepared statement with the NIC value as a parameter

    echo "Student removed successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Delete Student</h2>
    <!-- Form for submitting the NIC of the student to delete -->
    <form method="POST">
        <label>NIC</label>
        <input type="text" name="nic" required>
        <button type="submit">Delete</button><!-- Submit button for deleting the student -->
    </form>
</body>
</html>
