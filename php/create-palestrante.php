<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Palestrante</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Adicionar Novo Palestrante</h1>
    <form action="store-palestrante.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="biografia">Biografia:</label><br>
        <textarea id="biografia" name="biografia" rows="4" cols="50" required></textarea><br><br>

        <label for="foto">Upload da Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <label for="curriculo">Upload do Currículo (PDF):</label>
        <input type="file" id="curriculo" name="curriculo" accept="application/pdf" required><br><br>

        <button type="submit">Cadastrar Palestrante</button>
    </form>
</body>
</html>
