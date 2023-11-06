<!DOCTYPE html>
<html>
<head>
    <title>Inserir Bolo</title>
</head>
<body>
    <h1>Inserir Novo Bolo</h1>
    <form action="processar_inserir.php" method="POST" enctype="multipart/form-data">
        <label>Sabor:</label>
        <input type="text" name="sabor" required><br><br>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea><br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" required><br><br>

        <label>Foto:</label>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Inserir Bolo">
    </form>
</body>
</html>
