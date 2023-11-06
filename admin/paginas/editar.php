<!DOCTYPE html>
<html>
<head>
    <title>Editar Bolo</title><style>
/* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #007bff;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Manter o padding dentro do elemento */
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

@media screen and (max-width: 600px) {
    /* Estilos para telas menores (exemplo: dispositivos móveis) */
    .container {
        padding: 10px;
        max-width: 100%;
    }

    input[type="submit"] {
        width: 100%;
    }
}
</style>
</head>
<body>
    <?php
    include 'config.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM bolo WHERE id=$id";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $sabor = $linha['sabor'];
        $descricao = $linha['descricao'];
        $quantidade = $linha['quantidade'];

        echo "<h1>Editar Bolo</h1>";
        echo "<form action='processar_editar.php' method='POST'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "Sabor: <input type='text' name='sabor' value='$sabor'><br>";
        echo "Descrição: <textarea name='descricao'>$descricao</textarea><br>";
        echo "Quantidade: <input type='number' name='quantidade' value='$quantidade'><br>";
        echo "<input type='submit' value='Salvar'>";
        echo "</form>";
    } else {
        echo "Bolo não encontrado.";
    }

    $conexao->close();
    ?>
</body>
</html>
