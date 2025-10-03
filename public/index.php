<?php
require __DIR__ . '/../vendor/autoload.php';
use App\core\Router;

$url = $_GET['url'] ?? '';

$router = new Router();
$router->dispatch($url);

define('BASE_URL', '/colegio_primeira_opcao/public');