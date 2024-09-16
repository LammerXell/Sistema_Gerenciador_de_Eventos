<?php
require_once 'db.php';

// Fetch the list of speakers from the database
try {
    $stmt = $pdo->query("SELECT * FROM palestrantes");
    $palestrantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Palestrantes</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Lista de Palestrantes</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Biografia</th>
                <th>Foto</th>
                <th>Currículo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($palestrantes as $palestrante): ?>
                <tr>
                    <td><?= htmlspecialchars($palestrante['nome']) ?></td>
                    <td><?= htmlspecialchars($palestrante['biografia']) ?></td>
                    <td><img src="<?= htmlspecialchars($palestrante['foto']) ?>" alt="Foto" width="100"></td>
                    <td><a href="<?= htmlspecialchars($palestrante['curriculo']) ?>" target="_blank">Ver Currículo</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="create-palestrante.php">Adicionar Novo Palestrante</a>
</body>
</html>
