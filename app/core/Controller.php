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

    public function loadTemplateBoth($view, $viewData = []) {
        $this->ifSessionLogado();
        $admin = $_SESSION['admin'] == true ? 'Admin' : 'Public';
        require_once '../app/views/templates/template' . $admin . '.php';
    }

    public function loadTemplateAdmin($view, $viewData = []) {
        $this->ifSessionLogado();
        if($_SESSION['admin'] == false) {
            echo '
            <script>
                alert("Você não tem permissão de Administrador. Redirecionando para a página principal disponível...");
                window.location.href = "' . BASE_URL . '/home";
            </script>
            ';
        }
        
        require_once '../app/views/templates/templateAdmin.php';
        
    }

    public function loadTemplatePublic($view, $viewData = []) {
        $this->ifSessionLogado();
        if($_SESSION['admin'] == true) {
        echo '
        <script>
            alert("Você não pode navegar em uma página pública. Entre com uma conta de perfil público");
            window.location.href = "' . BASE_URL . '/adminHome";
        </script>
        ';
        }
        require_once '../app/views/templates/templatePublic.php';
    }

    public function ifSessionLogado() {
        if(count($_SESSION) == 0 || $_SESSION['logado'] == false) {
            header('Location: login');
        }
    }
        
}

