<?php
namespace App\core;
class Controller {
    public function view($view, $viewData = []) {
        extract($viewData);
        $viewFile =  '../app/views/' . $view . '.php';
        if(!file_exists($viewFile)) {
            throw new \Exception('View não encontrada: ' . $viewFile);
        }
        require_once $viewFile;
    }

    public function loadTemplate($view, $viewData = []) {
        require_once '../app/views/template.php';
    }
}