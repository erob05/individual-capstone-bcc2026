<?php

class UserController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function createUser($email, $password, $isAdmin = 0) {
        try {
            $sql = "INSERT INTO users (email, password, is_admin)
                    VALUES (:email, :password, :is_admin)";
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':is_admin' => $isAdmin
            ]);
        } catch (PDOException $e) {
            return false; // email likely already exists
        }
    }

    // LOGIN
    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

        return false;
    }

    // READ ALL
    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateUser($id, $email, $isAdmin) {
        $sql = "UPDATE users 
                SET email = :email, is_admin = :is_admin
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':is_admin' => $isAdmin,
            ':id' => $id
        ]);
    }

    // DELETE
    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}