<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\FuncionarioDao;

class AdminHomeController extends Controller
{
    private $fc;

    public function __construct() 
    {
        $this->fc = new FuncionarioDao();
    }

    public function index() {
        
        $dados = [];
        $dados['quantidadeDeFuncionarios'] = $this->fc->quantidadeDeFuncionários();

        $this->loadTemplateAdmin('adminView/home/index', $dados);
    }

    public function verPerfil() {
        $dados = [];
        $dados['funcionario'] = $this->fc->selecionarUsuarioPorID();
        $dados['funcionario_nome'] = $dados['funcionario']['nome'];
        $dados['funcionario_email'] = $dados['funcionario']['email'];
        $this->loadTemplateAdmin('homeBoth/perfil', $dados);
    }

}