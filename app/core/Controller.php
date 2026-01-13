<?php
class Controller {
    public function model($model) {
        require_once 'app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        // Gerenciamento de Idioma
        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'] == 'en' ? 'en' : 'pt';
        }
        
        $lang = $_SESSION['lang'] ?? 'pt';
        $langFile = 'app/languages/' . $lang . '.php';
        
        if (file_exists($langFile)) {
            $texts = require $langFile;
            $data['lang'] = $lang;
            $data['texts'] = $texts;
        }

        if (file_exists('app/views/' . $view . '.php')) {
            require_once 'app/views/' . $view . '.php';
        } else {
            die('View não encontrada');
        }
    }
}
?>
