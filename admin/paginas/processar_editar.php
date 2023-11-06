<?php
include 'config.php';

$id = $_POST['id'];
$sabor = $_POST['sabor'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];

// Atualizar os dados na tabela
$sql = "UPDATE bolo SET sabor='$sabor', descricao='$descricao', quantidade='$quantidade' WHERE id=$id";
if ($conexao->query($sql) === TRUE) {
    echo "Dados do bolo atualizados com sucesso!";
} else {
    echo "Erro ao atualizar os dados do bolo: " . $conexao->error;
}

$conexao->close();
?>
