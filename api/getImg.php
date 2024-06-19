<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['userId'])) {
    http_response_code(401);
    echo json_encode(array("error" => "Usuário não autenticado!"));
    exit;
}

include_once __DIR__ . '/../db/Database.php';

use db\Database;

try {
    $db = new Database();
    $conn = $db->connect();

    $userId = $_SESSION['userId'];

    // Consulta SQL para selecionar a imagem de perfil do usuário
    $sql = "SELECT Photograph.Photo, Photograph.PhotoType 
            FROM Photograph 
            INNER JOIN User ON Photograph.PhotoId = User.PhotoId 
            WHERE User.UserId = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se a imagem foi encontrada
    $photo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($photo) {
        // Configura o tipo de conteúdo da imagem
        header("Content-Type: " . $photo['PhotoType']);
        echo $photo['Photo'];
    } else {
        http_response_code(404);
        echo json_encode(array("error" => "Imagem não encontrada!"));
    }

    // Fechar a conexão com o banco de dados
    $db = null;
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("error" => "Erro no servidor: " . $e->getMessage()));
}
?>
