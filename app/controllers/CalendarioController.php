<?php

namespace App\Controllers;
use App\Core\Controller;

class CalendarioController extends Controller {
    public function index() {
        if (!empty($_SESSION['admin'] && $_SESSION['admin'] == true)) {
            $this->loadTemplateAdmin('calendario/index');
            exit;
        } else {
            $this->loadTemplatePublic('calendario/index');
            exit;
        }
        
    }
}
