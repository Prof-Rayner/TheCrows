<?php
include_once './sessao.php';
include_once __DIR__ . '/../db/Database.php';

use db\Database;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = 'Método inválido.';
    header('Location: ../login');
    exit;
}

if (!isset($_POST['loginEmail']) || !isset($_POST['loginPassword'])) {
    $_SESSION['error'] = 'Dados incompletos.';
    header('Location: ../login');
    exit;
}

$loginEmail = trim($_POST['loginEmail']);
$loginPassword = trim($_POST['loginPassword']);

if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Formato de e-mail inválido.';
    header('Location: ../login');
    exit;
}

try {
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT * FROM `user` WHERE `email` = :loginEmail";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':loginEmail' => $loginEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($loginPassword, $user['password'])) {
            $_SESSION['login'] = TRUE;
            $_SESSION['usuario'] = array(
                'ID' => $user['id'],
            );

            $_SESSION['success'] = 'Login bem-sucedido';
            $url = isset($_SESSION['redirecionar'])? $_SESSION['redirecionar'] : '../index';
            unset($_SESSION['redirecionar']);
            header("Location: $url");
            exit;
        } else {
            $_SESSION['error'] = 'Senha incorreta';
            header('Location: ../login');
            exit;
        }
    } else {
        $_SESSION['error'] = 'E-mail não cadastrado';
        header('Location: ../login');
        exit;
    }
} catch (PDOException $e) {
    $_SESSION['error'] = 'Erro no servidor: ' . $e->getMessage();
    header('Location: ../login');
    exit;
}
