<?php
require_once 'db.php';
// Lógica para verificar sessão e conexão com o banco aqui
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Evento</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Adicionar Novo Evento</h1>
    <form action="store-evento.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome do Evento:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="data">Data do Evento:</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="local">Local do Evento:</label>
        <input type="text" id="local" name="local" required><br><br>

        <label for="descricao">Descrição do Evento:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

        <label for="banner">Upload do Banner do Evento:</label>
        <input type="file" id="banner" name="banner" accept="image/*" required><br><br>

        <label for="pdf">Upload de Arquivo PDF (Informações do Evento):</label>
        <input type="file" id="pdf" name="pdf" accept="application/pdf" required><br><br>

        <button type="submit">Cadastrar Evento</button>
    </form>
</body>
</html>
