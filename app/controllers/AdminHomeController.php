<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\ClasseDao\FuncionarioDao;
use App\Models\ClasseDao\AlunoDao;

class AdminHomeController extends Controller
{
    private $funcionarios;
    private $alunos;

    public function __construct() 
    {
        $this->funcionarios = new FuncionarioDao();
        $this->alunos = new AlunoDao();
    }

    public function index() {
        
        $dados = [];
        $dados['quantidadeDeFuncionarios'] = $this->funcionarios->quantidadeDeFuncionarios();
        $dados['todosAlunos'] = $this->alunos->selecionarTodosAlunos();
        $dados['quantidadeDeAlunos'] = count($this->alunos->selecionarTodosAlunos());
        $dados['quantidadeDeAlunosReprovados'] = count($this->alunos->selecionarTodosReprovados());


        $this->loadTemplateAdmin('adminView/home/index', $dados);
    }

    public function verPerfil() {
        $dados = [];
        $dados['funcionario_id'] = $this->funcionarios->selecionarUsuarioPorID($_SESSION['usuario_id']);
        $dados['funcionario_nome'] = $dados['funcionario']['nome'];
        $dados['funcionario_email'] = $dados['funcionario']['email'];
        $this->loadTemplateAdmin('homeBoth/perfil', $dados);
    }

}