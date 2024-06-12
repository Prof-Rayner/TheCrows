<?php
session_start();
include_once '../db/Database.php';

$db = new db\Database;
$conn = $db->getConnection();

//Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $loginEmail, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($loginPassword, $user['password'])) {
            // Iniciar a sessão e armazenar os dados do usuário
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['start_time'] = time();
            echo json_encode(['message' => 'Login bem-sucedido.']);
        } else {
            echo json_encode(['message' => 'E-mail ou senha incorretos.']);
        }
        //Cadastro
    } elseif (isset($_POST['Nome']) && isset($_POST['Email']) && isset($_POST['Senha'])) {
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];

        $sql = "INSERT INTO usuarios (Nome, Email, Senha) VALUES (:nome, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $Nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
        $hashed_password = password_hash($Senha, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha', $hashed_password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Cadastrado com sucesso! $Nome";
        } else {
            echo "$Nome Não cadastrado!";
        }
    }
}

?>
