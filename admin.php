<?php
    include_once './api/sessao.php';
    validarLoginAdm();
    include_once './db/Database.php';
    use db\Database;
    

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Admin</title>
    
</head>

<body>
    <div id="header">
        <h1>Administrador</h1>
        <form action="./api/admin" method="POST">
            <button d="btnEncerrar" type="submit" name="executar_query">Encerrar Query</button>
        </form>
        <a href='index'><button>VOLTAR</button></a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Usuário</th>
                <th>Quantidade</th>
                <th>Tempo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db = new Database();
            $conexao = $db->connect();
            // Consultar Lista do ranking Geral
            $sql = "SELECT row_number() OVER (ORDER BY capturados DESC, menor_tempo ASC) AS ranking, usuario, capturados, SEC_TO_TIME(menor_tempo) AS tempo
            FROM (
                SELECT u.name AS usuario, COUNT(r.id) AS capturados,
                AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = r.id_user), r.date)) AS menor_tempo
                FROM user u LEFT JOIN rank r ON u.id = r.id_user GROUP BY u.id, u.name
                ) subquery
            ORDER BY
                capturados DESC, menor_tempo ASC";

            $resultado = $conexao->query($sql);

            if (!$resultado) {
                die("Erro ao executar a consulta: " . mysqli_error($conexao));
            }

            // Exibição dos dados na tabela
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                $porcento = number_format(($row['capturados']/12)*100,0);
                echo "<tr>";
                    echo "<td>" . $row['ranking'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo '<td><div role="progressbar" aria-valuenow="' . $row['capturados'] . '" aria-valuemin="0" aria-valuemax="100" style="--value: ' . ($porcento) . ';"></div></td>';
                    echo "<td>" . $row['tempo'] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>
