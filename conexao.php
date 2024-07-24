<?php

$usuario = 'root';
$senha = '';
$database = 'login system';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error) {
    die("falha ao conectar ao banco de dados" . $mysqli);
}
?>