<?php

include_once './sessao.php';

include_once __DIR__ . '/../db/Database.php';

use db\Database;

// Verificar se o usuário está autenticado
if (!isset($_SESSION['login'])) {
    http_response_code(401);
    echo json_encode(array("error" => "Usuário não autenticado!"));
    exit;
}


try {
    $db = new Database();
    $conn = $db->connect();
    
    $userId = $_SESSION['usuario']['ID'];

    // Função para obter informações do perfil
    function getUserInfo($userId, $conn)
    {
        $sql = "SELECT name, id_usertype, id_photo FROM user WHERE id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // <JEFF
    // FUNCAO PARA PEGAR TODOS OS CORVOS REGISTRADO E OS CAPTURADOS EM UMA ARRAY
    function getCrowsResultByUser($userId, $conn){
        $listaDeCorvos = array();
        $sql = "SELECT c.id AS id, c.name AS nome, c.tip AS dica,
        IF(rk.id_user IS NOT NULL, 1, 0) AS registrado FROM crow c
        LEFT JOIN rank rk ON c.id = rk.id_crow AND rk.id_user = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $listaDeCorvos[] = $row;
        }
        return $listaDeCorvos;
    }// JEFF>

    // // Função para obter o número de corvos coletados pelo usuário
    function getNumCorvosColetados($userId, $conn)
    {
        $sql = "SELECT COUNT(*) as numCorvosColetados FROM rank WHERE id_user = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['numCorvosColetados'];
    }

    // Função para obter o número total de corvos
    function getNumCorvosTotais($conn)
    {
        $sql = "SELECT COUNT(*) as numCorvosTotais FROM crow";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['numCorvosTotais'];
    }

    // // Função para obter a classificação do usuário
    function getUserRank($userId, $conn){
        $sql = "WITH rankings AS (
            SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados,  SEC_TO_TIME(menor_tempo) AS tempo
            FROM (
                SELECT u.name AS usuario, COUNT(r.id) AS capturados,
                AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = u.id), r.date)) AS menor_tempo
                FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
            ) subquery
        )
        SELECT ranking FROM rankings WHERE usuario = (SELECT name FROM user WHERE id = :userId);";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se houve resultado da consulta
        if ($result) {
            return $result['ranking'];
        } else {
            return '?';
        }
    }

    // Obter informações do perfil
    $userInfo = getUserInfo($userId, $conn);
    if (!$userInfo) {
        http_response_code(404);
        echo json_encode(array("error" => "Usuário não encontrado"));
        exit;
    }
    $_SESSION['usuario']["id_usertype"] = $userInfo['id_usertype'];

    // Obter número de corvos coletados
    $numCorvosColetados = getNumCorvosColetados($userId, $conn);

    // Obter número total de corvos
    $numCorvosTotais = getNumCorvosTotais($conn);

    // Obter classificação do usuário
    $rank = getUserRank($userId, $conn);

    // JEFF
    $listaDeCorvos = getCrowsResultByUser($userId, $conn);

    // Montar resposta JSON
    $response = [
        'username' => $userInfo['name'],
        'foto' => $userInfo['id_photo'],
        'usertype' => $userInfo['id_usertype'],
        'numCorvosColetados' => $numCorvosColetados,
        'numCorvosTotais' => $numCorvosTotais,
        'rank' => $rank,
        'listaDeCorvos' => $listaDeCorvos,// JEFF
    ];

    echo json_encode($response);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("error" => "Erro no servidor: " . $e->getMessage()));
}
?>
