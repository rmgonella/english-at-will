<?php
class Contact {
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
        $query = "SELECT * FROM contacts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($data) {
        if (!$this->db) return false;
        $query = "INSERT INTO contacts (name, email, whatsapp, message) VALUES (:name, :email, :whatsapp, :message)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':whatsapp', $data['whatsapp']);
        $stmt->bindParam(':message', $data['message']);
        return $stmt->execute();
    }

    public function updateStatus($id, $status) {
        if (!$this->db) return false;
        $query = "UPDATE contacts SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        if (!$this->db) return false;
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
