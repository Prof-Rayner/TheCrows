<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
    
</head>

<body>
    <div id="header">
        <h1>Administrador</h1>
        <button id="btnEncerrar" onclick="window.location.href = 'login.php';">Encerrar</button>
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
            // Configuração do banco de dados
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $banco = "thecrow";

            // Conectando ao banco de dados
            $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
            if (!$conexao) {
                die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
            }

            // Consulta SQL para obter os dados
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

            // Exibição dos dados na tabela
            if ($resultado->num_rows > 0) {
                while ($user_data = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['ranking'] . "</td>";
                    echo "<td>" . $user_data['usuario'] . "</td>";
                    echo '<td><div role="progressbar" aria-valuenow="' . $user_data['qtd_corvos'] . '" aria-valuemin="0" aria-valuemax="100" style="--value: ' . ($user_data['qtd_corvos'] /12*100) . ';"></div></td>';
                    echo "<td>" . $user_data['tempo'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum resultado encontrado.</td></tr>";
            }

            // Fechar conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</body>

</html>
