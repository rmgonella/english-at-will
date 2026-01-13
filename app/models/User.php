<?php
class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        if (!$this->db) {
            error_log("Falha na conexão com o banco de dados no model " . get_class($this));
        }
    }

    public function login($username, $password) {
        if (!$this->db) return false;
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
}
?>
