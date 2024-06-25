<?php
include_once 'sessao.php';
include_once __DIR__ . '/../db/Database.php';
use db\Database;

if (!isset($_GET['hash'])){
    header('Location: ./index');
}

function pegarCorvoHash($hash, $conn){
    $sql = "SELECT id, name FROM `crow` WHERE `hash` =:hashcorvo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hashcorvo', $hash, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function registrarCorvo($userId, $hash, $conn){
    $sql = "INSERT INTO `rank`(id_user, id_crow) SELECT user.id, crow.id FROM user, crow WHERE user.id = $userId AND crow.hash = :hashcorvo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hashcorvo', $hash, PDO::PARAM_STR);
    try {
        $stmt->execute();
        return $conn->lastInsertId();
    }catch(Exception $e){ return FALSE; }
}

try {
    $db = new Database();
    $conn = $db->connect();

    $hash = $_GET['hash'];
    $userId = $_SESSION['usuario']['ID'];

    $corvo = pegarCorvoHash($hash, $conn);
    if ($corvo){

        $registro = registrarCorvo($userId, $hash, $conn);
        
        if ($registro){ //registrou corretamente
            $data = json_encode(array(
                "registro" => TRUE,
                "corvo" => $corvo,
                "erro" => '',
            ));
        }else{
            //ja tem registrado
            $data = json_encode(array(
                "registro" => FALSE,
                "corvo" => $corvo,
                "erro" => 'corvo já capturado.',
            ));

        }
    }else{
        $data = json_encode(array(
            "registro" => FALSE,
            "erro" => 'Corvo não existe !',
        ));
    }
    echo "<script>var crow = $data;</script>";
    $db = null;
    
} catch (Exception $e) {
    echo $e;
    header('Location: ./index');
    exit;
}

?>
