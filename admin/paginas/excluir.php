<!DOCTYPE html>
<html>
<head>
    <title>Excluir Bolo</title>
</head>
<body>
    <?php
    include 'config.php';

    $id = $_GET['id'];

    echo "<h1>Excluir Bolo</h1>";
    echo "<p>Tem certeza de que deseja excluir este bolo?</p>";
    echo "<a href='processar_excluir.php?id=$id'>Sim</a> | <a href='index.php'>Não</a>";

    $conexao->close();
    ?>
</body>
</html>
