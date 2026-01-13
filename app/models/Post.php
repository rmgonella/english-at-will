<?php
class Post {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        if (!$this->db) return [];
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        if (!$this->db) return null;
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getBySlug($slug) {
        if (!$this->db) return null;
        $query = "SELECT * FROM posts WHERE slug = :slug";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function create($data) {
        if (!$this->db) return false;
        $query = "INSERT INTO posts (title, title_en, slug, content, content_en, image_url) VALUES (:title, :title_en, :slug, :content, :content_en, :image_url)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':title_en', $data['title_en']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':content_en', $data['content_en']);
        $stmt->bindParam(':image_url', $data['image_url']);
        return $stmt->execute();
    }

    public function update($data) {
        if (!$this->db) return false;
        $query = "UPDATE posts SET title = :title, title_en = :title_en, slug = :slug, content = :content, content_en = :content_en, image_url = :image_url WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':title_en', $data['title_en']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':content_en', $data['content_en']);
        $stmt->bindParam(':image_url', $data['image_url']);
        $stmt->bindParam(':id', $data['id']);
        return $stmt->execute();
    }

    public function delete($id) {
        if (!$this->db) return false;
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
