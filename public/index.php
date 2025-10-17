<?php
require __DIR__ . '/../vendor/autoload.php';
use App\core\Router;

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$router = new Router();
$router->dispatch($url);