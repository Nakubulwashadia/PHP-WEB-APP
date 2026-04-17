<?php
require_once '../config/database.php';
require_once '../models/Student.php';

$db = (new Database())->connect();
$student = new Student($db);

if (isset($_GET['id'])) {
    $student->delete($_GET['id']);
}

header("Location: ../views/index.php");
exit();