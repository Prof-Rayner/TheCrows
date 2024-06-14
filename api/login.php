<?php
include_once './db/Database.php';
session_start();



function login( $Email, $Senha ) {
    echo "$Email |  $Senha <br>";
    $db = new db\Database;
    $conn = $db->getConnection();

    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt ->rowCount() > 0){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['Password'] == $Senha ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['start_time'] = time();
            echo json_encode(['message' => 'Login bem-sucedido.']);
            header('location: index.php');
            exit;
        }else{
            echo 'erro';
            echo json_encode(['message' => 'E-mail ou senha incorretos.']);
        }
    }
}

?>
