<?php

require_once ("../banco/chamados.php");

$user = $_POST['user'];
$senha = $_POST['senha'];
$tec = $_POST['nivel'];

if ($tec == "Usuário") {
    $tec = 0;
} else {
    $tec = 1;
}

$sql = "INSERT INTO `usuario` (`user`, `senha`, `tecnico`) VALUES ('$user', '$senha', '$tec')";
$statement = $pdo->query($sql);
$usuarios = $statement->fetchAll(PDO::FETCH_OBJ);
header('Location: ../usuarios.php');
?>