<?php
namespace App\Controllers;
use App\Core\Controller;

class PerfilController extends Controller
{
    public function index() {

        $this->loadTemplateBoth('homeBoth/perfil');

    }
}