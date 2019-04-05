<?php

require_once ("../banco/chamados.php");

$solicitante = $_POST['solicitanteChamado'];
$titulo = $_POST['tituloChamado'];
$descricao = $_POST['descricaoChamado'];
$categoria = $_POST['categoria'];
$status = 1;


$sql = "INSERT INTO `chamados` (`solicitante`, `titulo`, `descricao`, `categoria`, `status`) VALUES ('$solicitante', '$titulo', '$descricao','$categoria', $status)";

$statement = $pdo->query($sql);
$chamados = $statement->fetchAll(PDO::FETCH_OBJ);
header('Location: ../chamados.php');
?>