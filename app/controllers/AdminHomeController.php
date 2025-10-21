<?php
namespace App\Controllers;
use App\Core\Controller;

class AdminHomeController extends Controller
{
    public function index() {
        $this->loadTemplate('adminView/home/index');
    }
}