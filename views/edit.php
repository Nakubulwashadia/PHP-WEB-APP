<?php
require_once '../config/database.php';
require_once '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

$data = $student->getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Student</h2>

<form method="POST" action="../controllers/update.php">

    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <input class="form-control mb-2" name="name" value="<?= $data['name'] ?>" required>
    <input class="form-control mb-2" name="email" value="<?= $data['email'] ?>" required>
    <input class="form-control mb-2" name="course" value="<?= $data['course'] ?>">

    <button class="btn btn-primary">Update</button>
</form>

</body>
</html>