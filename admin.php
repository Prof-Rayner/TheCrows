<?php
include_once './api/sessao.php';
validarLoginAdm();
include_once './db/Database.php';
use db\Database;
$db = new Database();
$conexao = $db->connect();

// Verificar se o botão "Encerrar" foi clicado
if (isset($_POST['encerrar'])) {
    try {
        // Iniciar transação para garantir atomicidade das operações
        $conexao->beginTransaction();

        // Atualizar todos os registros para '09:30:00' para id_user = 1
        $sql_update_93000 = "
            UPDATE rank
            SET date = CONCAT(CAST(date AS DATE), ' 09:30:00')
            WHERE id_user = 1;
        ";
        $stmt_update_93000 = $conexao->prepare($sql_update_93000);
        $stmt_update_93000->execute();

        // Atualizar o último registro para '09:30:01' para id_user = 1
        $sql_update_93001 = "
            UPDATE rank
            SET date = CONCAT(CAST(date AS DATE), ' 09:30:01')
            WHERE id = (
                SELECT id
                FROM rank
                WHERE id_user = 1
                ORDER BY date DESC
                LIMIT 1
            );
        ";
        $stmt_update_93001 = $conexao->prepare($sql_update_93001);
        $stmt_update_93001->execute();

        // Commit da transação
        $conexao->commit();
    } catch (PDOException $e) {
        // Rollback da transação em caso de erro
        $conexao->rollBack();
        die("Erro durante a transação: " . $e->getMessage());
    }
}

// Consulta SQL original para obter todos os dados
$sql = "
    SELECT
        ranking,
        usuario,
        qtd_corvos,
        SEC_TO_TIME(tempo) AS tempo
    FROM (
        SELECT
            ROW_NUMBER() OVER (
                ORDER BY qtd_corvos DESC, menor_tempo ASC
            ) AS ranking,
            usuario,
            qtd_corvos,
            menor_tempo AS tempo
        FROM (
            SELECT
                u.name AS usuario,
                COUNT(r.id) AS qtd_corvos,
                AVG(TIMESTAMPDIFF(SECOND, (SELECT MIN(r2.date) FROM rank r2 WHERE r2.id_user = u.id), r.date)) AS menor_tempo
            FROM
                USER u
            LEFT JOIN rank r ON u.id = r.id_user
            GROUP BY u.id, u.name
        ) AS subquery
    ) AS ranking_query
    ORDER BY qtd_corvos DESC, tempo ASC;
";

$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro ao executar a consulta: " . mysqli_error($conexao));
}
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
        <form method="post">
            <button id="btnEncerrar" name="encerrar">Encerrar</button>
        </form>
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
            // Exibição dos dados na tabela principal
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $porcento = number_format(($row['qtd_corvos'] / 12) * 100, 0);
                echo "<tr>";
                echo "<td>" . $row['ranking'] . "</td>";
                echo "<td>" . $row['usuario'] . "</td>";
                echo '<td><div role="progressbar" aria-valuenow="' . $row['qtd_corvos'] . '" aria-valuemin="0" aria-valuemax="100" style="--value: ' . ($porcento) . ';"></div></td>';
                echo "<td>" . $row['tempo'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
