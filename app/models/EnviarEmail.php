<?php
namespace App\Models;
use Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = new \SendGrid\Mail\Mail();
$email->setFrom('paulo.rodrigues.develop@gmail.com', 'Paulo Victor');
$email->setSubject('Redefinição de senha');
$email->addTo('paulo.rodrigues.develop@gmail.com', 'Paulo Victor');
$email->addContent("text/plain", 'Aqui abaixo está um link de redefinição de senha');

$sendgrid = new \SendGrid($_ENV['']);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";


} catch (Exception $e) {
    echo "Erro no envio do email: " . $e->getMessage();
}
