<?php
class Setting {
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
        $query = "SELECT * FROM settings";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        $settings = [];
        foreach ($results as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }
        return $settings;
    }

    public function update($key, $value) {
        if (!$this->db) return false;
        
        // Verificar se a chave já existe
        $query = "SELECT id FROM settings WHERE setting_key = :key";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':key', $key);
        $stmt->execute();
        
        if ($stmt->fetch()) {
            // Update
            $query = "UPDATE settings SET setting_value = :value WHERE setting_key = :key";
        } else {
            // Insert
            $query = "INSERT INTO settings (setting_key, setting_value) VALUES (:key, :value)";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':key', $key);
        return $stmt->execute();
    }
}
?>
