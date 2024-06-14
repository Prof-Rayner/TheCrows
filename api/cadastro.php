<?php
session_start();
include_once '../db/Database.php';

$db = new db\Database;
$conn = $db->getConnection();

$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Senha = $_POST['Senha'];

$PhotoId = 1;
$UserTypeId = 2;

try {
    $sql = "INSERT INTO `user` (`Username`, `Email`, `Password`, `UserTypeId`, `PhotoId`) 
    VALUES (:Nome, :Email, :Senha, :UserTypeId, :PhotoId)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Nome', $Nome);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Senha', $Senha);
    $stmt->bindParam(':UserTypeId', $UserTypeId);
    $stmt->bindParam(':PhotoId', $PhotoId);

    if ($stmt->execute()) {
        header('location: ../index.php');

    } else {
        echo "$Nome não cadastrado!";

    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>
