<?php
class ProjectController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function createProject($title, $github_url, $image_url) {
        $sql = "INSERT INTO projects (title, github_url, image_url)
                VALUES (:title, :github_url, :image_url)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':github_url' => $github_url,
            ':image_url' => $image_url
        ]);
    }

    // READ ALL
    public function getAllProjects() {
        $sql = "SELECT * FROM projects ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function getProjectById($id) {
        $sql = "SELECT * FROM projects WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateProject($id, $title, $github_url, $image_url) {
        $sql = "UPDATE projects 
                SET title = :title,
                    github_url = :github_url,
                    image_url = :image_url
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':github_url' => $github_url,
            ':image_url' => $image_url,
            ':id' => $id
        ]);
    }

    // DELETE
    public function deleteProject($id) {
        $sql = "DELETE FROM projects WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}