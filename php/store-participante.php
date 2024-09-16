<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
    // Handle file uploads
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = 'uploads/' . $foto; // Define a pasta onde as imagens serão armazenadas
    move_uploaded_file($foto_tmp, $foto_path);
    
    $comprovante = $_FILES['comprovante']['name'];
    $comprovante_tmp = $_FILES['comprovante']['tmp_name'];
    $comprovante_path = 'uploads/' . $comprovante; // Define a pasta onde os PDFs serão armazenados
    move_uploaded_file($comprovante_tmp, $comprovante_path);
    
    // Insert data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO participantes (nome, email, telefone, foto, comprovante) VALUES (:nome, :email, :telefone, :foto, :comprovante)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':foto', $foto_path);
        $stmt->bindParam(':comprovante', $comprovante_path);
        $stmt->execute();
        
        header('Location: index-participante.php'); // Redirect to the list of participants
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>
