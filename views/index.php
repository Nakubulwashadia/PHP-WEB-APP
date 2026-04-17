<?php
require_once '../config/database.php';
require_once '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);
$students = $student->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Student Records</h2>

<a href="create.php" class="btn btn-primary mb-3">Add Student</a>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $students->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['course'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="../controllers/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>