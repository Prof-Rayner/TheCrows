<?php
session_start();
include_once __DIR__ . '/../db/Database.php';

use db\Database;

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['Nome']);
    $email = trim($_POST['Email']);
    $senha = trim($_POST['Senha']);

    // Verificação básica se os campos não estão vazios
    if (empty($nome) || empty($email) || empty($senha)) {
        $_SESSION['error'] = 'Todos os campos são obrigatórios.';
        header('Location: ../login.php');
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Formato de e-mail inválido.';
        header('Location: ../login.php');
        exit;
    } else {
        // Hash da senha para armazenamento seguro
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        try {
            // Verificar se o e-mail já está cadastrado
            $query = $conn->prepare("SELECT * FROM `User` WHERE `Email` = :Email");
            $query->bindParam(":Email", $email, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $_SESSION['error'] = 'O usuário já está cadastrado!';
                header('Location: ../login.php');
                exit;
            } else {
                // Selecionar uma foto aleatória
                $photoQuery = $conn->prepare("SELECT `PhotoId` FROM `Photograph` ORDER BY RAND() LIMIT 1");
                $photoQuery->execute();
                $photoResult = $photoQuery->fetch(PDO::FETCH_ASSOC);

                if (!$photoResult) {
                    $_SESSION['error'] = 'Não foi possível selecionar uma foto aleatória.';
                    header('Location: ../login.php');
                    exit;
                }

                $photoId = $photoResult['PhotoId'];

                // Valor fixo para UserTypeId (usuário comum)
                $userTypeId = 2;

                // Inserir novo usuário no banco de dados
                $sql = "INSERT INTO `User` (`Username`, `Email`, `Password`, `UserTypeId`, `PhotoId`) 
                        VALUES (:Nome, :Email, :Senha_hash, :UserTypeId, :PhotoId)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':Nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':Senha_hash', $senha_hash, PDO::PARAM_STR);
                $stmt->bindParam(':UserTypeId', $userTypeId, PDO::PARAM_INT);
                $stmt->bindParam(':PhotoId', $photoId, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    // Recuperar o ID do usuário recém-cadastrado
                    $userId = $conn->lastInsertId();
                    $_SESSION['userId'] = $userId;

                    $_SESSION['success'] = 'Cadastrado com sucesso!';
                    header('Location: ../index.php');
                    exit;
                } else {
                    $_SESSION['error'] = 'Erro no cadastro!';
                    header('Location: ../login.php');
                    exit;
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Erro ao executar a consulta: ' . $e->getMessage();
            header('Location: ../login.php');
            exit;
        }
    }
} else {
    $_SESSION['error'] = 'Método inválido.';
    header('Location: ../login.php');
    exit;
}
?>
