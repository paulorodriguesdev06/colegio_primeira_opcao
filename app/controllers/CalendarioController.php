<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\ClasseDao\EventoCalendarioDao;

class CalendarioController extends Controller {
    public function index() {

        $this->loadTemplateBoth('calendario/index');
        
    }
}
