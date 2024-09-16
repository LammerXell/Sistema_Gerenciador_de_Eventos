<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Eventos - Sistema IFPE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Gerenciamento de Eventos IFPE</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>Eventos: 
                        <a href="/php/create-evento.php">Adicionar Evento</a> | 
                        <a href="/php/index-evento.php">Listar Eventos</a>
                    </li>
                    <li>Participantes: 
                        <a href="/php/create-participante.php">Adicionar Participante</a> | 
                        <a href="/php/index-participante.php">Listar Participantes</a>
                    </li>
                    <li>Palestrantes: 
                        <a href="/php/create-palestrante.php">Adicionar Palestrante</a> | 
                        <a href="/php/index-palestrante.php">Listar Palestrantes</a>
                    </li>
                    <li>Arquivos: 
                        <a href="/php/upload-arquivos.php">Gerenciar Arquivos</a>
                    </li>
                    <li><a href="/php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/php/user-login.php">Login</a></li>
                    <li><a href="/php/user-register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Bem-vindo ao Sistema de Gerenciamento de Eventos IFPE</h2>
        <p>Utilize o menu acima para cadastrar e gerenciar eventos, participantes, palestrantes e arquivos.</p>
        <br>
        <p>Esta versão inclui a exportação de dados e upload de arquivos, como banners e PDFs.</p>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Eventos IFPE</p>
    </footer>
</body>
</html>
