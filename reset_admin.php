<?php
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Erro: Não foi possível conectar ao banco de dados. Verifique as configurações em config/database.php");
}

$username = 'wilsonmarcal@gmail.com';
$password = '#english@will123';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    // Verificar se o usuário existe
    $check = $db->prepare("SELECT id FROM users WHERE username = :username");
    $check->bindParam(':username', $username);
    $check->execute();
    
    if ($check->rowCount() > 0) {
        // Atualizar senha
        $query = "UPDATE users SET password = :password WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        echo "<h3>Sucesso!</h3>";
        echo "A senha do usuário <b>wilsonmarcal@gmail.com</b> foi resetada para: <b>#english@will123</b><br>";
    } else {
        // Criar usuário
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();
        echo "<h3>Sucesso!</h3>";
        echo "O usuário <b>wilsonmarcal@gmail.com</b> não existia e foi criado com a senha: <b>#english@will123</b><br>";
    }
    
    echo "<br><a href='index.php?url=admin/login'>Ir para a página de login</a>";
    echo "<br><br><b>IMPORTANTE:</b> Delete este arquivo (reset_admin.php) do seu servidor após o uso por segurança.";

} catch (PDOException $e) {
    echo "Erro ao processar: " . $e->getMessage();
}
?>
