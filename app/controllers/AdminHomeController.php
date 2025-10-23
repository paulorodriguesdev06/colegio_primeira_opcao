<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\FuncionarioDao;

class AdminHomeController extends Controller
{
    // private $funcionario;

    // public function __construct() {
    //     $this->funcionario = new FuncionarioDao();
    // }

    public function index() {
        
        $dados = [];
        // $dados['quantidadeDeFuncionarios'] = $this->funcionario->quantidadeDeFuncionários();

        $this->loadTemplateAdmin('adminView/home/index', $dados);
    }

    public function verPerfil() {
        $dados = [];
        // $dados['funcionario'] = $this->funcionario->selecionarUsuarioPorID();
        $dados['funcionario_nome'] = $dados['funcionario']['nome'];
        $dados['funcionario_email'] = $dados['funcionario']['email'];
        $this->loadTemplateAdmin('adminView/home/perfil', $dados);
    }

}