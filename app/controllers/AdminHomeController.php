<?php
namespace App\Controllers;
use App\Core\Controller;

class AdminHomeController extends Controller
{
    public function index() {
        $dados = [];
        $this->loadTemplateAdmin('adminView/home/index', $dados);
    }

}