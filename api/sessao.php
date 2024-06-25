<?php
session_start();

verificarTempoSessao();


function verificarTempoSessao(){
    $tempo = 900; //min*60seg -> 15min*60 = 900
    if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > $tempo )) {
        logout();
    }
    $_SESSION['time'] = time();
}


function validarSessao(){
    //se nao estiver logado
    if( !isset($_SESSION['login']) ){
        $_SESSION['redirecionar'] = $_SERVER['REQUEST_URI'];
        header('location: ./login');
        exit;
    }
}


function validarLoginAdm(){
    validarSessao();
    // se não for um ADM
    if ($_SESSION['usuario']['id_usertype'] != 1){
        header('location: ./index');
        exit;
    }
}


function logout(){
    session_unset();
}


?>