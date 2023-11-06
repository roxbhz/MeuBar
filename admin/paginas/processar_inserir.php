<?php
include 'config.php';

$sabor = $_POST['sabor'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];

// Processar o upload da foto
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['foto']['name']);
move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);

// Inserir dados na tabela
$sql = "INSERT INTO bolo (sabor, descricao, quantidade, foto) VALUES ('$sabor', '$descricao', '$quantidade', '$uploadFile')";

if ($conexao->query($sql) === TRUE) {
    echo "Bolo inserido com sucesso!";
} else {
    echo "Erro ao inserir o bolo: " . $conexao->error;
}

$conexao->close();
?>
