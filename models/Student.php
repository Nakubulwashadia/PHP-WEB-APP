<?php
class Student {
    private $conn;
    private $table = "students";

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create($name, $email, $course) {
        $sql = "INSERT INTO $this->table (name, email, course)
                VALUES (:name, :email, :course)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':name' => htmlspecialchars($name),
            ':email' => htmlspecialchars($email),
            ':course' => htmlspecialchars($course)
        ]);
    }

    // READ
    public function read() {
        return $this->conn->query("SELECT * FROM $this->table ORDER BY id DESC");
    }

    // GET ONE
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $name, $email, $course) {
        $sql = "UPDATE $this->table 
                SET name=:name, email=:email, course=:course
                WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':name' => htmlspecialchars($name),
            ':email' => htmlspecialchars($email),
            ':course' => htmlspecialchars($course)
        ]);
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }
}