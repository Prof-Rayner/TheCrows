<?php
include_once './sessao.php';

include_once __DIR__ . '/../db/Database.php';
use db\Database;

$db = new Database();
$conn = $db->connect();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['Nome']);
    $email = trim($_POST['Email']);
    $senha = trim($_POST['Senha']);
    $conSenhar = trim($_POST['ConfirmarSenha']);

// Hash da senha$password_hash = hashPassword($password);

    // Verificação básica se os campos não estão vazios
    if (empty($nome) || empty($email) || empty($senha) || empty($conSenhar)) {
        $_SESSION['error'] = 'Todos os campos são obrigatórios.';
        header('Location: ../login');
        exit;

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Formato de e-mail inválido.';
        header('Location: ../login');
        exit;

    } elseif ($senha !== $conSenhar){
        $_SESSION['error'] = 'As senhas não coincidem. Por favor, tente novamente..';
        header('Location: ../login');
        exit;

    } else {
        // Hash da senha para armazenamento seguro
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        try {
            // Verificar se o e-mail já está cadastrado
            $query = $conn->prepare("SELECT * FROM `user` WHERE `email` = :Email");
            $query->bindParam(":Email", $email, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $_SESSION['error'] = 'Email já está cadastrado!';
                header('Location: ../login');
                exit;

            } else {
                // Inserir novo usuário no banco de dados
                $sql = "INSERT INTO `user` (`name`, `email`, `password`, `id_usertype`, `id_photo`) 
                        VALUES (:Nome, :Email, :Senha_hash, 2, FLOOR(1 + RAND() * 14) )";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':Nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':Senha_hash', $senha_hash, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    // Recuperar o ID do usuário recém-cadastrado
                    $_SESSION['login'] = TRUE;
                    $_SESSION['usuario'] = array(
                        'ID' => $conn->lastInsertId(),
                    );
                    $_SESSION['success'] = 'Cadastrado com sucesso!';
                    header('Location: ../index');
                    exit;

                } else {
                    $_SESSION['error'] = 'Erro no cadastro!';
                    header('Location: ../login');
                    exit;
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Erro ao executar a consulta: ' . $e->getMessage();
            header('Location: ../login');
            exit;
        }
    }
} else {
    $_SESSION['error'] = 'Método inválido.';
    header('Location: ../login');
    exit;
}
?>
