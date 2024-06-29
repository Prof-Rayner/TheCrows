<?php

include_once __DIR__ . '/../db/Database.php';
use db\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["executar_query"])) {
    try {
        $db = new Database();
        $conn = $db->connect();
    
        $zerarTempoUsuario = "UPDATE rank SET date = CONCAT(CAST(date AS DATE), ' 09:30:00') WHERE id_user = :id_user";
    
        $acrescentarTempo = "UPDATE rank  SET date = CONCAT( DATE_FORMAT(date, '%Y-%m-%d %H:%i:'), :seconds
        ) WHERE id = ( SELECT id FROM rank WHERE id_user = :id_user ORDER BY date DESC LIMIT 1)";
    
        $pegar_top3 = "SELECT ranking, id_usuario, usuario, qtd_corvos FROM (
            SELECT ROW_NUMBER() OVER ( ORDER BY qtd_corvos DESC, menor_tempo ASC) AS ranking, id_usuario, usuario, qtd_corvos
            FROM ( SELECT u.id AS id_usuario, u.name AS usuario, COUNT(r.id) AS qtd_corvos,
                AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = u.id), r.date)) AS menor_tempo
            FROM USER u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name ) AS subquery
            ) AS ranking_query
            WHERE ranking <= 3 ORDER BY qtd_corvos DESC";
        
        $ranking = $conn->query($pegar_top3);
        if ($ranking){
            $segundos = 1;
            while($row = $ranking->fetch(PDO::FETCH_ASSOC)){
                $stmt1 = $conn->prepare($zerarTempoUsuario);
                $stmt1->bindParam(':id_user', $row["id_usuario"], PDO::PARAM_INT);
                $stmt1->execute();
    
                $stmt2 = $conn->prepare($acrescentarTempo);
                $segTexto = sprintf('%02d', $segundos);
                $stmt2->bindParam(':id_user', $row["id_usuario"], PDO::PARAM_INT);
                $stmt2->bindParam(':seconds', $segTexto, PDO::PARAM_STR);
                $stmt2->execute();
                $segundos++;
            }
        }
        header("Location: ../admin");
        exit;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("error" => "Erro no servidor: " . $e->getMessage()));
    }
    
    // $consultar_ranking_geral = "SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados, SEC_TO_TIME(menor_tempo) AS tempo
    //     FROM (
    //         SELECT u.name AS usuario, COUNT(r.id) AS capturados,
    //         AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = r.id_user), r.date)) AS menor_tempo
    //         FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
    //         ) subquery
    //     ORDER BY
    //         capturados DESC, menor_tempo ASC";
    
    // $consulta_rank_usuario = "WITH rankings AS (
    //             SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados,  SEC_TO_TIME(menor_tempo) AS tempo
    //             FROM (
    //                 SELECT u.name AS usuario, COUNT(r.id) AS capturados,
    //                 AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = u.id), r.date)) AS menor_tempo
    //                 FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
    //             ) subquery
    //         )
    //         SELECT ranking FROM rankings WHERE usuario = (SELECT name FROM user WHERE id = $ID);";
}
?>