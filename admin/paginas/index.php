<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Bolos</title>
    <style>
    
    body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

.container {
  padding: 20px;
}

h1 {
  color: #007bff;
}

a {
  color: #007bff;
  text-decoration: none;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

table th,
table td {
  padding: 10px;
  text-align: left;
}

table th {
  background-color: #007bff;
  color: white;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}

.table-actions a {
  margin-right: 10px;
}

.form-container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.bolos-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.bolo-item {
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.bolo-img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
    border-radius: 4px;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Bolos</h1>
        <a href="inserir.php">Inserir Novo Bolo</a><br><br>

        <div class="container">
        <h1>Lista de Bolos</h1>
        <a href="inserir.php">Inserir Novo Bolo</a><br><br>

        <?php
        include 'config.php';

        $sql = "SELECT * FROM bolo";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<div class='bolos-list'>";

            while ($linha = $resultado->fetch_assoc()) {
                echo "<div class='bolo-item'>";
                echo "<h2>" . $linha['sabor'] . "</h2>";
                echo "<p>" . $linha['descricao'] . "</p>";
                echo "<p>Quantidade: " . $linha['quantidade'] . "</p>";
                echo "<img src='" . $linha['foto'] . "' alt='" . $linha['sabor'] . "' class='bolo-img'>";
                echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a> | <a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "Nenhum bolo encontrado.";
        }

        $conexao->close();
        ?>
    </div>
    </div>
</body>
</html>
