<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\LoginQueries;
use App\views\login;


class LoginController extends Controller {

    private $lq;

    public function __construct() {
        $this->lq = new LoginQueries();
    }
    public function index() {
        $dados = [];
        $dados['erro'] = $this->login();

        $this->view('login/index', $dados);
    }

    public function redefinirSenha() {
        $this->view('login/redefinirSenha');
    }

    public function login() {
        $login = $this->lq->loginCadastro();
        return $login;
    }
}