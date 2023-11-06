<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Lista de Bolos</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .listagemDeBolos {
            margin-top: 20px;
        }

        /* Estilos para dispositivos móveis */
        @media screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .container h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .listagemDeBolos h3 {
                font-size: 18px;
                margin-bottom: 5px;
                margin-left: 10px;
            }

            .listagemDeBolos p {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .listagemDeBolos img {
                max-width: calc(100% - 20px);
                height: auto;
                margin-top: 10px;
                margin-left: 10px;
                margin-right: 10px;
                border-radius: 6px;
            }

            .listagemDeBolos .btns {
                text-align: center;
                margin-top: 10px;
            }

            .listagemDeBolos .btns a {
                display: inline-block;
                margin: 5px;
            }

            .listagemDeBolos a.edit {
                background-color: #4caf50;
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                text-decoration: none;
            }

            .listagemDeBolos a {
                background-color: #f44336;
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                text-decoration: none;
            }

            .listagemDeBolos a:hover {
                background-color: #d32f2f;
            }

            .listagemDeBolos a.edit:hover {
                background-color: #45a049;
            }
        }
    </style>
</head>
<body>
<div class="listagemDeBolos">
    <?php
    include 'config.php';

    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];

        $sqlDelete = "DELETE FROM bolo WHERE id = $deleteId";
        if ($conexao->query($sqlDelete) === TRUE) {
            echo "Bolo excluído com sucesso.";
        } else {
            echo "Erro ao excluir o bolo: " . $conexao->error;
        }
    }

    $sql = "SELECT * FROM bolo";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "<h3>" . $linha['sabor'] . "</h3>";
            echo "<img src='" . $linha['foto'] . "' width='100%'>";
            echo "<p>Quantidade: " . $linha['quantidade'] . "</p>";
            echo "<div class='btns'>";
            echo "<a class='edit' onclick='editarBolo(" . $linha['id'] . ")'>Editar Bolo</a>";
            echo "<a href='?delete_id=" . $linha['id'] . "' onclick='return confirmExclusao()'>Deletar Bolo</a>";
            echo "</div>";
        }
    } else {
        echo "Nenhum bolo encontrado.";
    }

    $conexao->close();
    ?>
</div>

<script>
    function editarBolo(id) {
        window.location.href = "editar.php?id=" + id;
    }

    function confirmExclusao() {
        return confirm("Tem certeza de que deseja excluir este bolo?");
    }
</script>
</body>
</html>
