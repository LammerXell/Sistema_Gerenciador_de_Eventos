<?php
require_once 'db.php';

// Faz a consulta para obter todos os eventos do banco de dados
try {
    $stmt = $pdo->prepare("SELECT * FROM eventos");
    $stmt->execute();
    $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Eventos</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Eventos Cadastrados</h1>
    
    <?php if (count($eventos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th>Descrição</th>
                    <th>Banner</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                    <tr>
                        <td><?= htmlspecialchars($evento['nome']) ?></td>
                        <td><?= htmlspecialchars($evento['data']) ?></td>
                        <td><?= htmlspecialchars($evento['local']) ?></td>
                        <td><?= htmlspecialchars($evento['descricao']) ?></td>
                        <td>
                            <img src="/uploads/<?= htmlspecialchars($evento['banner']) ?>" alt="Banner" width="100">
                        </td>
                        <td>
                            <a href="/uploads/<?= htmlspecialchars($evento['pdf']) ?>" target="_blank">Ver PDF</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum evento cadastrado.</p>
    <?php endif; ?>
</body>
</html>
