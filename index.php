<?php
session_start();

// Configurações de erro para desenvolvimento (altere para 0 em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
require_once 'app/core/App.php';
require_once 'app/core/Controller.php';

// Autoload básico para models
spl_autoload_register(function($className) {
    if (file_exists('app/models/' . $className . '.php')) {
        require_once 'app/models/' . $className . '.php';
    }
});

$app = new App();
?>
