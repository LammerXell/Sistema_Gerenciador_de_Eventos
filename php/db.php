<?php
// Configuração da conexão
$host = 'localhost';
$port = 3307;
$db = 'gerenciador_eventos';
$user = 'root';
$pass = '';

try {
    // Conectando com PDO e definindo atributos
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemplo de consulta preparada
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :nome");
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $nome = 'João';
    $stmt->execute();

    // Obtendo resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($resultados);
    
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
