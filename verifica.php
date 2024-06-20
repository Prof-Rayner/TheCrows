<?php
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "root";        // Nome de usuário do MySQL
$password = "";            // Senha do MySQL
$dbname = "the_crows";     // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o parâmetro 'hash' foi passado na URL
if (isset($_GET['hash'])) {
    // Sanitiza o valor do hash para evitar SQL injection
    $hash = $conn->real_escape_string($_GET['hash']);
    
    // Query SQL para buscar o ID com base no hash
    $sql = "SELECT Id, Name, Tip FROM crow WHERE Cod_crow = '$hash'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Exibir o ID encontrado
        $row = $result->fetch_assoc();
        echo "ID encontrado: " . $row['Id'];
        echo "<br><br>Nome: " . $row['Name'];
        echo "<br><br>A dica é: " . $row['Tip'];

        // Redirecionar para parabens.html
        header("Location: parabens.html");
        exit();
    } else {
        echo "Nenhum registro encontrado para o hash: $hash";
    }
    
    // Liberar o resultado da consulta
    $result->free();
} else {
    echo "Nenhum hash foi passado na URL.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
