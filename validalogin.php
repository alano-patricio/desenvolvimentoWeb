<?php

if (isset($_SESSION['LOGADO'])) { //verifica se a sessão já não estava aberta e destrói a sessão
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();
}

$user = isset($_POST['user']) ? trim($_POST['user']) : "";
$pass = isset($_POST['senha']) ? trim($_POST['senha']) : "";
if ($user !== "alano" || $pass !== "123") {
    header("location: logoff.php");
} else {
    session_start();
    $_SESSION['LOGADO'] = 'verdade';
    $_SESSION['login_usr'] = $user;
    $_SESSION['last_login_timestamp'] = time();
//abre a pagina inicial
    header("location: index.php");
}