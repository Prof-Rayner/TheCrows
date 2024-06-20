<?php

session_start();
tempoDeSessao();

function tempoDeSessao()
{
    $limite = 900; // min*60seg | 10min*60seg = 600
    if (isset($_SESSION['ultimoLogin'])) {
        if ((time() - $_SESSION['ultimoLogin']) > $limite) {
            logout();
        }
        $_SESSION['ultimoLogin'] = time();
    }
}

function validarEmail($email)
{
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    echo preg_match($regex, $email) ? "The email is valid"."<br>" :"The email is not valid";
}

function validarSenha($password)
{
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';
    return preg_match($pattern, $password) ? true : false;
}

function login()
{
    
}


function logout()
{
    session_unset();
    header('refresh:1;url=index');
    exit;
}