<?php

$login = $_POST["usuario"];
$senha = $_POST["senha"];

tryLogin($login, $senha);


function tryLogin($login, $password)
{
    $resultado = mysqli_query($conexao, "select * from usuarios where username ='" . $login . "' and password = '" . $password . "'");
    $rows = mysqli_num_rows($resultado);

    if ($rows == 1) {
        $_SESSION['login_user'] = $login;
        $_SESSION['login_pass'] = $password;
        header("url do site");
    } else header("");
}
