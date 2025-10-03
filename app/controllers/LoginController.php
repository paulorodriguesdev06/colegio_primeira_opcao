<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\LoginQueries;
use App\views\login;


class LoginController extends Controller {
    public function index() {
        $this->view('login/index');
        self::login();
    }

    public function redefinirSenha() {
        $this->view('login/redefinirSenha');
    }

    public static function login() {
        if (!empty($_POST['usuario']) && !empty($_POST['senha']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $loginQueries = new LoginQueries();
            $dadosdoUsuario = $loginQueries->seUsuarioExiste($usuario);

            if ($dadosdoUsuario != false) {
                if (password_verify($senha, $dadosdoUsuario['senha'])) {
                    $admin = $dadosdoUsuario['admin'];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $dadosdoUsuario['id'];
                    $_SESSION['nome'] = $dadosdoUsuario['nome'];
                    $_SESSION['usuario'] = $dadosdoUsuario['usuario'];
                    $_SESSION['telefone'] = $dadosdoUsuario['telefone'];
                    if($admin == 1) {
                        $_SESSION['admin'] = true;
                        header('Location: adminHome');
                        exit();
                    } else {
                        $_SESSION['admin'] = false;
                        header('Location: home');
                        exit();
                    }
                    
                } else {
                    echo 'Senha incorreta';
                }
                
            } else {
                echo 'Não foi possivel logar';
            }
        }
    }
}