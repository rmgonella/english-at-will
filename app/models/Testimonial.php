<?php
class Testimonial {
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
        $query = "SELECT * FROM testimonials ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($data) {
        if (!$this->db) return false;
        $query = "INSERT INTO testimonials (student_name, content, rating, image_url) VALUES (:student_name, :content, :rating, :image_url)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':student_name', $data['student_name']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':image_url', $data['image_url']);
        return $stmt->execute();
    }

    public function getById($id) {
        if (!$this->db) return null;
        $query = "SELECT * FROM testimonials WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($data) {
        if (!$this->db) return false;
        $query = "UPDATE testimonials SET student_name = :student_name, content = :content, rating = :rating, image_url = :image_url WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':student_name', $data['student_name']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':image_url', $data['image_url']);
        return $stmt->execute();
    }

    public function delete($id) {
        if (!$this->db) return false;
        $query = "DELETE FROM testimonials WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
