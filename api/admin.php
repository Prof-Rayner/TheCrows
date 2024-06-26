<?php

$consultar_ranking_geral = "SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados, SEC_TO_TIME(menor_tempo) AS tempo
    FROM (
        SELECT u.name AS usuario, COUNT(r.id) AS capturados,
        AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = r.id_user), r.date)) AS menor_tempo
        FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
        ) subquery
    ORDER BY
        capturados DESC, menor_tempo ASC";


$ID = 1
$consulta_rank_usuario = "WITH rankings AS (
            SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados,  SEC_TO_TIME(menor_tempo) AS tempo
            FROM (
                SELECT u.name AS usuario, COUNT(r.id) AS capturados,
                AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = u.id), r.date)) AS menor_tempo
                FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
            ) subquery
        )
        SELECT ranking FROM rankings WHERE usuario = (SELECT name FROM user WHERE id = $ID);";

?>

<!--
    https://codepen.io/alvaromontoro/pen/LYjZqzP?editors=1100 
    https://codepen.io/KrzysiekF/pen/bGdRaLr

-->