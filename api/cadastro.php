<?php
session_start();
include_once '../db/Database.php';

$db = new db\Database;
$conn = $db->getConnection();

$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Senha = $_POST['Senha'];

// Define o PhotoId padrão
$PhotoId = 1;

if (strpos($Email, '@admin.com') !== false) {
    $UserTypeId = 1; // 1 para admin
} else {
    $UserTypeId = 2; // 2 para user
}

// Verifica se o UserTypeId existe na tabela UserType
$checkUserTypeSql = "SELECT COUNT(*) FROM UserType WHERE UserTypeId = :UserTypeId";
$checkUserTypeStmt = $conn->prepare($checkUserTypeSql);
$checkUserTypeStmt->bindParam(':UserTypeId', $UserTypeId);
$checkUserTypeStmt->execute();
$userTypeExists = $checkUserTypeStmt->fetchColumn();

// Verifica se o PhotoId padrão existe na tabela photograph
$checkPhotoSql = "SELECT COUNT(*) FROM photograph WHERE PhotoId = :PhotoId";
$checkPhotoStmt = $conn->prepare($checkPhotoSql);
$checkPhotoStmt->bindParam(':PhotoId', $PhotoId);
$checkPhotoStmt->execute();
$photoExists = $checkPhotoStmt->fetchColumn();

if ($userTypeExists && $photoExists) {
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
            echo "Cadastrado com sucesso! $Nome";
        } else {
            echo "$Nome não cadastrado!";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    if (!$userTypeExists) {
        echo "Erro: Tipo de usuário inválido.";
    }
    if (!$photoExists) {
        echo "Erro: Foto inválida.";
    }
}
?>
