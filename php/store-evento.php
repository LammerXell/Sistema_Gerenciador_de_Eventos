<?php
require_once 'db.php'; // Inclui a conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $local = $_POST['local'];
    $descricao = $_POST['descricao'];

    // Configurações para o upload dos arquivos
    $bannerDir = 'uploads/';
    $pdfDir = 'uploads/';

    // Verifica se o upload do banner foi feito corretamente
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === 0) {
        $banner = basename($_FILES['banner']['name']);
        $bannerPath = $bannerDir . $banner;
        
        // Move o arquivo para a pasta de destino
        if (!move_uploaded_file($_FILES['banner']['tmp_name'], $bannerPath)) {
            echo "Erro ao fazer upload do banner.";
            exit;
        }
    } else {
        echo "Erro no upload do banner.";
        exit;
    }

    // Verifica se o upload do PDF foi feito corretamente
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0) {
        $pdf = basename($_FILES['pdf']['name']);
        $pdfPath = $pdfDir . $pdf;

        // Move o arquivo para a pasta de destino
        if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfPath)) {
            echo "Erro ao fazer upload do PDF.";
            exit;
        }
    } else {
        echo "Erro no upload do PDF.";
        exit;
    }

    // Insere os dados no banco de dados
    try {
        $stmt = $pdo->prepare("INSERT INTO eventos (nome, data, local, descricao, banner, pdf) VALUES (:nome, :data, :local, :descricao, :banner, :pdf)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':local', $local);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':banner', $banner);
        $stmt->bindParam(':pdf', $pdf);

        // Executa a inserção
        $stmt->execute();
        echo "Evento cadastrado com sucesso!";
        
        // Redireciona para a página de listagem de eventos (index-evento.php)
        header("Location: index-evento.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao cadastrar evento: " . $e->getMessage();
    }

} else {
    echo "Método de requisição inválido.";
}
?>
