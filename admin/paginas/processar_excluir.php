<?php
include 'config.php';

$id = $_GET['id'];

// Excluir o bolo da tabela
$sql = "DELETE FROM bolo WHERE id=$id";
if ($conexao->query($sql) === TRUE) {
    echo "Bolo excluído com sucesso!";
} else {
    echo "Erro ao excluir o bolo: " . $conexao->error;
}

$conexao->close();
?>
