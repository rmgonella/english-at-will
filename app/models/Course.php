<?php
class Course {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        if (!$this->db) {
            error_log("Falha na conexão com o banco de dados no model " . get_class($this));
        }
    }

    public function getAll() {
        if (!$this->db) return [];
        $query = "SELECT * FROM courses ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        if (!$this->db) return null;
        $query = "SELECT * FROM courses WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function create($data) {
        if (!$this->db) return false;
        $query = "INSERT INTO courses (title, description, icon) VALUES (:title, :description, :icon)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':icon', $data['icon']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        if (!$this->db) return false;
        $query = "UPDATE courses SET title = :title, description = :description, icon = :icon WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':icon', $data['icon']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        if (!$this->db) return false;
        $query = "DELETE FROM courses WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
