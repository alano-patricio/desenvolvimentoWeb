<?php

require_once ("../banco/chamados.php");

$numerochamado = $_POST['numeroChamado'];
$dataAbertura = $_POST['dataAberturaChamado'];
$solicitanteChamado = $_POST['solicitanteChamado'];
$tituloChamado = $_POST['tituloChamado'];
$descricaoChamado = $_POST['descricaoChamado'];
$solucaoChamado = $_POST['solucaoChamado'];
$statusChamado = $_POST['statusChamado'];
$tecnicoChamado = $_POST['selecionarTecnico'];
$tempoChamado = $_POST['tempoChamado'];
$encerramentoChamado = $_POST['encerramentoChamado'];
$previsaoChamado = $_POST['dataPrevisao'];

if ($statusChamado == "Aberto"){
    $statusChamado = 1;
}
else{
    $statusChamado = 0;
}

//$sql = "UPDATE `chamados` SET (`inicio`, `solicitante`, `titulo`, `descricao`, `solucao` , `tecnico`, `status`) VALUES ('$dataAbertura', '$solicitanteChamado', '$tituloChamado','$descricaoChamado','$solucaoChamado','Alano','$statusChamado') WHERE `id`= $numerochamado";
$sql = "UPDATE `chamados` SET inicio='$dataAbertura', `solicitante`='$solicitanteChamado', `titulo`='$tituloChamado', `descricao`='$descricaoChamado', `solucao`='$solucaoChamado', `previsao`='$previsaoChamado', `tecnico`='$tecnicoChamado', `tempo`='$tempoChamado', `status`=$statusChamado, `finalizacao`='$encerramentoChamado' WHERE  `id`=$numerochamado";
echo $sql;
$statement = $pdo->query($sql);
$tecnicos = $statement->fetchAll(PDO::FETCH_OBJ);
header('Location: ../chamados.php');
?>

