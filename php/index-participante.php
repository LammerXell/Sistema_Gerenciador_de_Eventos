<?php
require_once 'db.php';

// Fetch the list of participants from the database
try {
    $stmt = $pdo->query("SELECT * FROM participantes");
    $participantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Participantes</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Lista de Participantes</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Foto</th>
                <th>Comprovante</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participantes as $participante): ?>
                <tr>
                    <td><?= htmlspecialchars($participante['nome']) ?></td>
                    <td><?= htmlspecialchars($participante['email']) ?></td>
                    <td><?= htmlspecialchars($participante['telefone']) ?></td>
                    <td><img src="<?= htmlspecialchars($participante['foto']) ?>" alt="Foto" width="100"></td>
                    <td><a href="<?= htmlspecialchars($participante['comprovante']) ?>" target="_blank">Ver Comprovante</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="create-participante.php">Adicionar Novo Participante</a>
</body>
</html>
