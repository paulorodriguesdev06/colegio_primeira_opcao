<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\LoginQueries;
use App\Models\Session;


class LoginController extends Controller
{

    private $lq;

    public function __construct()
    {
        $this->lq = new LoginQueries();
    }

    public function index()
    {
        $erro = $this->login();
        $this->view('login/index', ['erro' => $erro]);
        
    }

    public function login()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['senha']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuarioDigitado = $_POST['usuario'];
            $senhaDigitada = $_POST['senha'];
            $usuario = $this->lq->seUsuarioExiste($usuarioDigitado);

            if ($usuario) {
                if ($senhaDigitada == $usuario['senha']) {
                    Session::setSession('nome', $usuario['nome']);
                    Session::setSession('usuario_id', $usuario['id']);
                    if ($usuario['admin'] == 1) {
                        Session::setSession('admin', true);
                        header('Location: ' . BASE_URL . '/adminHome');
                        exit;
                        return true;
                    } else {
                        Session::setSession('admin', false);
                        header('Location: ' . BASE_URL . '/home');
                        exit;
                        return true;
                    }
                } else {
                    $erro = 'Usuário ou senha incorretos.';
                    return $erro;
                }
            } else {
                $erro = 'Usuário não encontrado.';
                return $erro;
            }
        }
    }
    public function redefinirSenha()
    {
        $this->view('login/redefinirSenha');
    }
}
