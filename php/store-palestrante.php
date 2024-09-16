<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $biografia = $_POST['biografia'];
    
    // Handle file uploads
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = 'uploads/' . $foto; // Define a pasta onde as imagens serão armazenadas
    move_uploaded_file($foto_tmp, $foto_path);
    
    $curriculo = $_FILES['curriculo']['name'];
    $curriculo_tmp = $_FILES['curriculo']['tmp_name'];
    $curriculo_path = 'uploads/' . $curriculo; // Define a pasta onde os PDFs serão armazenados
    move_uploaded_file($curriculo_tmp, $curriculo_path);
    
    // Insert data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO palestrantes (nome, biografia, foto, curriculo) VALUES (:nome, :biografia, :foto, :curriculo)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':biografia', $biografia);
        $stmt->bindParam(':foto', $foto_path);
        $stmt->bindParam(':curriculo', $curriculo_path);
        $stmt->execute();
        
        header('Location: index-palestrante.php'); // Redirect to the list of speakers
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>
