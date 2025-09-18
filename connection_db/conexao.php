<?php 


$dsn = "mysql:host=localhost;dbname=meu_banco";
$user = 'root';
$pass = "";

try {
	$pdo = new PDO($dsn,$user,$pass);

} catch (PDOException $e) {
	die('Erro de conexão:' . $e->getMessage());
};