<?php
include_once __DIR__ . '/../db/Database.php';
use db\Database;

session_start();

if (isset($_SESSION['userID'])) {
    $userId = $_SESSION['userID'];

    try {
        $db = new Database();
        $conn = $db->connect();

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
            echo  "<script>alert('Imagem não encontrada!);</script>";
        }
    } catch (PDOException $e) {
        echo "Erro no servidor: " . $e->getMessage();
    }
} else {
    echo  "<script>alert('Usuário não autenticado!);</script>";
}
