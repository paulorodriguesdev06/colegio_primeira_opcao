<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Session;
use App\Models\Email;
use App\Models\ClasseDao\FuncionarioDao;


class LoginController extends Controller
{

    private $fc;

    public function __construct()
    {
        $this->fc = new FuncionarioDao();
    }

    public function redefinirSenha()
    {
        $dados = [];
       
        
        $this->view('login/redefinirSenha', $dados);
    }

    public function index()
    {
        $dados = [];
        $dados['inputs'] = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $dados['usuario'] = $dados['inputs']['usuario'];
        $dados['senha'] = $dados['inputs']['senha'];
        $dados['erro'] = $this->login();
        $erro = $this->login();
        $this->view('login/index', $dados);
        
    }

    public function login()
    {
        
        if (!empty($_POST['usuario']) && !empty($_POST['senha']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuarioDigitado = $_POST['usuario'];
            $senhaDigitada = $_POST['senha'];
            $usuario = $this->fc->selecionarFuncionarioporUsuario($usuarioDigitado);

            if ($usuario) {
                if ($senhaDigitada == $usuario->getSenha()) {
                    Session::setSession('nome', $usuario->getNome());
                    Session::setSession('usuario_id', $usuario->getId());
                    Session::setSession('logado', true);
                    if ($usuario->getAdmin() == 1) {
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

}
