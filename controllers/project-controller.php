<?php

class ProjectController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function create($title, $github, $image) {
        $sql = "INSERT INTO projects (title, github_url, image_url)
                VALUES (:title, :github, :image)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':github' => $github,
            ':image' => $image
        ]);
    }

    // READ ALL
    public function getAll() {
        return $this->pdo->query("SELECT * FROM projects ORDER BY id DESC")
                         ->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $title, $github, $image) {
        $sql = "UPDATE projects 
                SET title = :title, github_url = :github, image_url = :image
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':github' => $github,
            ':image' => $image,
            ':id' => $id
        ]);
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}