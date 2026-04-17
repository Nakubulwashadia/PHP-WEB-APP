<?php
require_once '../config/database.php';
require_once '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $student->update(
        $_POST['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['course']
    );
}

header("Location: ../views/index.php");
exit();