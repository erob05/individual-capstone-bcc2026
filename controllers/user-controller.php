<?php
class UserController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function createUser($email, $password) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    // READ ALL
    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateUser($id, $email) {
        $sql = "UPDATE users SET email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':id' => $id
        ]);
    }

    // DELETE
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}