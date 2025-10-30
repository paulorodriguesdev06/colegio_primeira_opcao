<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\ClasseDao\FuncionarioDao;
use App\Models\ClasseDao\AlunoDao;
use App\Models\Api\ClimaTempoApi;

class AdminHomeController extends Controller
{
    private $funcionarios;
    private $alunos;
    private $climaTempo;

    public function __construct() 
    {
        $this->funcionarios = new FuncionarioDao();
        $this->alunos = new AlunoDao();
        $this->climaTempo = new ClimaTempoApi();
    }

    public function index() {
        $this->climaTempo->setCep(24421021);
        
        $dados = [];
        $dados['quantidadeDeFuncionarios'] = $this->funcionarios->quantidadeDeFuncionarios();
        $dados['todosAlunos'] = $this->alunos->selecionarTodosAlunos();
        $dados['quantidadeDeAlunos'] = count($this->alunos->selecionarTodosAlunos());
        $dados['quantidadeDeAlunosReprovados'] = count($this->alunos->selecionarTodosReprovados());
        $dados['clima'] = $this->climaTempo->getClimaTempo();


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