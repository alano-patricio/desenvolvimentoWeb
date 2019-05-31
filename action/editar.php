<?php

include 'validaSessao.php';

if (isset($_POST['realizarAtualizacaoNoBanco'])) {

    $novo_cliente = array(
        'nomeCliente' => $_POST['nomeCliente'],
        'enderecoCliente' => $_POST['enderecoCliente'],
        'numeroCliente' => $_POST['numeroCliente'],
        'observacaoCliente' => $_POST['observacaoCliente'],
        'cepCliente' => $_POST['cepCliente'],
        'bairroCliente' => $_POST['bairroCliente'],
        'cidadeCliente' => $_POST['cidadeCliente'],
        'estadoCliente' => $_POST['estadoCliente'],
        'telefoneCliente' => $_POST['telefoneCliente'],
        'emailCliente' => $_POST['emailCliente'],
        'idDoCliente' => $_POST['realizarAtualizacaoNoBancoComIdCliente']);

    $upd = $pdo->prepare("UPDATE tb_clientes SET nome = :nomeCliente,endereco = :enderecoCliente,numero = :numeroCliente,observacao = :observacaoCliente,cep = :cepCliente,bairro = :bairroCliente,cidade = :cidadeCliente,estado = :estadoCliente,telefone = :telefoneCliente,email = :emailCliente WHERE id_cliente = :idDoCliente");
    $upd->execute($novo_cliente);

    if ($upd->rowCount() > 0) {
        include 'menu.php';
        include 'listarClientes.php';
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
} elseif (isset($_POST['editarNovoProduto'])) {



    if ($_FILES['fotoProduto']['name']) {
        $encoded_image = "data:" . $_FILES['fotoProduto']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['fotoProduto']['tmp_name']));
    } else {
        $encoded_image = $_POST['nomeImagemAntiga'];
    }



    $novo_produto = array(
        'descricaoProduto' => $_POST['descricaoProduto'],
        'precoProduto' => $_POST['precoProduto'],
        'fotoProduto' => $encoded_image,
        'idDoProduto' => $_POST['realizarAtualizacaoNoBancoComIdProduto']);

    $updp = $pdo->prepare("UPDATE tb_produtos SET descricao = :descricaoProduto,valor = :precoProduto,imagem =:fotoProduto WHERE id_produto =:idDoProduto");
    $updp->execute($novo_produto);

    if ($updp->rowCount() > 0) {
        include 'menu.php';
        include 'listarProdutos.php';
    } else {
        include 'menu.php';
        include 'listarProdutos.php';
    }
} elseif (isset($_POST['editarProdutoNoPedido'])) {
    $editaProdutoDaListaDePedido = array(
        'quantidade' => $_POST['recebeNovaQuantidade'],
        'valor' => $_POST['recebeNovoValor'],
        'id_pedido' => $_POST['id_pedidoEdicao'],
        'id_produto' => $_POST['id_produtoEdicao'],
        'observacao' => $_POST['recebeNovaObservacao']);

    $updp = $pdo->prepare("UPDATE tb_pedido_produtos SET quantidade = :quantidade,valor = :valor,observacao =:observacao WHERE id_pedido =:id_pedido and id_produto =:id_produto");
    $updp->execute($editaProdutoDaListaDePedido);

    if ($updp->rowCount() > 0) {
        include 'menu.php';
        include 'pedidos.php';
    } else {
        echo "Fodeu!";
    }
}
?>
