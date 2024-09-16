<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Participante</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Adicionar Participante</h1>
    <form action="store-participante.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" class="input-padrao" required placeholder="(xx) xxxxx-xxxx">

        <label for="foto">Upload da Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <label for="curriculo">Upload do Comprovante (PDF):</label>
        <input type="file" id="comprovante" name="comprovante" accept="application/pdf" required><br><br>

        <button type="submit" value="Submit">Submit</button>

    </form>
</body>

