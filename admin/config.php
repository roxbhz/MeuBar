<?php
$host = 'localhost';
$usuario = 'roxbhzco_teste';
$senha = 'Legolas@123';
$bancoDados = 'roxbhzco_teste';

$conexao = new mysqli($host, $usuario, $senha, $bancoDados);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}
?>
