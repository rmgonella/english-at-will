<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'u686465056_english');
define('DB_USER', 'u686465056_english');
define('DB_PASS', '$c+@qAl8');

// URL Base do Site - Certifique-se de que o SSL (https) está ativo no servidor
define('URLROOT', 'https://englishatwill.com.br');
define('SITENAME', 'English At Will');

class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8mb4");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            // Em produção, não exibir o erro diretamente
            error_log("Erro de conexão: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?>
