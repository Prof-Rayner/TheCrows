<?php
session_start();

include_once __DIR__ . '/../db/Database.php';

use db\Database;

// Verificar se o usuário está autenticado
if (!isset($_SESSION['userId'])) {
    http_response_code(401);
    echo json_encode(array("error" => "Usuário não autenticado!"));
    exit;
}

try {
    $db = new Database();
    $conn = $db->connect();

    $userId = $_SESSION['userId'];

    // Função para obter informações do perfil
    function getUserInfo($userId, $conn)
    {
        $sql = "SELECT Username FROM User WHERE UserId = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para obter o número de corvos coletados pelo usuário
    function getNumCorvosColetados($userId, $conn)
    {
        $sql = "SELECT COUNT(*) as numCorvosColetados FROM Rank WHERE UserId = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['numCorvosColetados'];
    }

    // Função para obter o número total de corvos
    function getNumCorvosTotais($conn)
    {
        $sql = "SELECT COUNT(*) as numCorvosTotais FROM Crow";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['numCorvosTotais'];
    }

    // Função para obter a classificação do usuário
    function getUserRank($userId, $conn)
    {
        $sql = "WITH ranked_data AS (
                    SELECT
                        UserId,
                        COUNT(CrowId) AS quantidade_corvos,
                        ROW_NUMBER() OVER (
                            ORDER BY COUNT(CrowId) DESC, MIN(Date) ASC
                        ) AS ranking
                    FROM
                        Rank
                    GROUP BY
                        UserId
                )
                SELECT ranking
                FROM ranked_data
                WHERE UserId = :userId";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se houve resultado da consulta
        if ($result) {
            return $result['ranking'];
        } else {
            return null;
        }
    }

    // Obter informações do perfil
    $userInfo = getUserInfo($userId, $conn);
    if (!$userInfo) {
        http_response_code(404);
        echo json_encode(array("error" => "Usuário não encontrado"));
        exit;
    }

    // Obter número de corvos coletados
    $numCorvosColetados = getNumCorvosColetados($userId, $conn);
    // Obter número total de corvos
    $numCorvosTotais = getNumCorvosTotais($conn);
    // Obter classificação do usuário
    $rank = getUserRank($userId, $conn);

    // Montar resposta JSON
    $response = [
        'username' => $userInfo['Username'],
        'numCorvosColetados' => $numCorvosColetados,
        'numCorvosTotais' => $numCorvosTotais,
        'rank' => $rank,
    ];

    echo json_encode($response);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("error" => "Erro no servidor: " . $e->getMessage()));
}
?>
