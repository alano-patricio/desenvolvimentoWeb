<?php

include 'validaSessao.php';
if (isset($_POST['realizarExclusaoNoBanco'])) {
    $exclui_cliente = array('id' => $_POST['realizarExclusaoNoBanco']);

    $exclusao = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente =:id");
    $exclusao->execute($exclui_cliente);

    if ($exclusao->rowCount() > 0) {
        include 'menu.php';
        include 'listarClientes.php';
    } else {
        echo "<br><br><br>ERRO Excluir!!!!!";
    }
} elseif (isset($_POST['excluirProduto'])) {
    $exclui_produto = array('id' => $_POST['excluirProduto']);

    $exclusao = $pdo->prepare("DELETE FROM tb_pedido_produtos WHERE id_produto =:id");
    $exclusao->execute($exclui_produto);

    if ($exclusao->rowCount() > 0) {
        include 'menu.php';
        include 'listarProdutos.php';
    } else {
        echo "<br><br><br>ERRO Excluir!!!!!";
    }
} elseif (isset($_POST['excluirProdutoDaLista'])) {
    $exclui_produto = array('id_produto' => $_POST['excProdutoList'], 'id_pedido' => $_POST['excluirPedidoDaLista']);

    $exclusao = $pdo->prepare("DELETE FROM tb_pedido_produtos WHERE id_pedido =:id_pedido and id_produto =:id_produto");
    $exclusao->execute($exclui_produto);

    if ($exclusao->rowCount() > 0) {
        include 'menu.php';
        include 'pedidos.php';
    } else {
        echo "<br><br><br>ERRO Excluir!!!!!";
    }
} elseif (isset($_POST['buttonExcluirPedidoFinal'])) {

    $exclui_pedido = array('id_pedido' => $_POST['excluirPedidoFinal']);

    $exclusao = $pdo->prepare("DELETE FROM tb_pedidos WHERE id_pedido =:id_pedido");
    $exclusao->execute($exclui_pedido);

    if ($exclusao->rowCount() > 0) {
        include 'menu.php';
        include 'prePedidos.php';
    } else {
        echo "Produto já foi excluído";
    }
}
?>

