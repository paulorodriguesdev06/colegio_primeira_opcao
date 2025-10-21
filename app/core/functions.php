<?php
define('BASE_URL', '/colegio_primeira_opcao');
define('BASE_ASSETS', BASE_URL . '/public/assets');
define('BASE_IMAGES', BASE_URL . '/public/images/');

function dd(... $vars) {
    echo '<pre style="background: #f1f1f1; color: #000; padding: 10px;">';
    echo '<strong> Debug Output: </strong>';
    foreach ($vars as $var) {
       echo '<pre style="background: #f5f5f5; color: #000; padding: 10px;">';
        var_dump($var);
        echo '</pre>';
    }
    $backtrace = debug_backtrace()[0];
    echo '<strong> File: </strong>' . $backtrace['file'] . '<br>';
    echo '<strong> Line: </strong>' . $backtrace['line'] . '<br>';
    echo '</pre>';
    die();
}