<?php

include 'validaSessao.php';
if (isset($_POST['realizarCadastroNoBanco'])) {


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
        'emailCliente' => $_POST['emailCliente']);

    $insert = $pdo->prepare("INSERT INTO tb_clientes (nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email) VALUES (:nomeCliente,:enderecoCliente,:numeroCliente,:observacaoCliente,:cepCliente,:bairroCliente,:cidadeCliente,:estadoCliente,:telefoneCliente,:emailCliente)");
    $insert->execute($novo_cliente);

    if ($insert->rowCount() > 0) {
        include 'menu.php';
        include 'listarClientes.php';
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
} elseif (isset($_POST['gravarNovoProduto'])) {

    if (isset($_FILES['fotoProduto'])) {
        $encoded_image = "data:" . $_FILES['fotoProduto']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['fotoProduto']['tmp_name']));
    }


    $novo_produto = array(
        'descricaoProduto' => $_POST['descricaoProduto'],
        'precoProduto' => $_POST['precoProduto'],
        'fotoProduto' => $encoded_image);

    $insert = $pdo->prepare("INSERT INTO tb_produtos (descricao,valor,imagem) VALUES (:descricaoProduto,:precoProduto,:fotoProduto)");
    $insert->execute($novo_produto);

    if ($insert->rowCount() > 0) {
        include 'menu.php';
        include 'listarProdutos.php';
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
} elseif (isset($_POST['cadastrarClienteParaFazerPedido'])) {
    $novo_cliente_pedido = array(
        'id_cliente' => $_POST['buscarClientePedido'],
        'observacao' => $_POST['observacaoClientePedido']);

    $insert = $pdo->prepare("INSERT INTO tb_pedidos (data_hora,id_cliente,observacao) VALUES (NOW(), :id_cliente,:observacao)");
    $insert->execute($novo_cliente_pedido);
    unset($_POST['cadastrarClienteParaFazerPedido']);


    if ($insert->rowCount() > 0) {
        include 'menu.php';
        include 'pedidos.php';
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
} elseif (isset($_POST['AddProduto'])) {

    $verificaProduto = array(
        'id_pedido' => $_POST['idPedido'],
        'id_produto' => $_POST['idProduto']);

    $pop = $pdo->prepare("SELECT * FROM tb_pedido_produtos WHERE id_pedido = :id_pedido AND id_produto = :id_produto");
    $pop->execute($verificaProduto);
    $dadosPedido = $pop->fetch();

    if ($dadosPedido) {
        $editaProdutoDaListaDePedido = array(
            'novaQuantidade' => $dadosPedido['quantidade'] + $_POST['quantidadeProdutos'],
            'id_pedido' => $_POST['idPedido'],
            'id_produto' => $_POST['idProduto']);

        $updp = $pdo->prepare("UPDATE tb_pedido_produtos SET quantidade = :novaQuantidade WHERE id_pedido =:id_pedido and id_produto =:id_produto");
        $updp->execute($editaProdutoDaListaDePedido);

        include 'menu.php';
        include 'pedidos.php';
    } else {
        $produtinho = array(
            'id_pedido' => $_POST['idPedido'],
            'id_produto' => $_POST['idProduto'],
            'quantidade' => $_POST['quantidadeProdutos'],
            'valor' => $_POST['valor'],
            'obsevacao' => $_POST['observacaoProdutos']);
        $insert = $pdo->prepare("INSERT INTO tb_pedido_produtos (id_pedido,id_produto,quantidade,valor,observacao) VALUES (:id_pedido, :id_produto,:quantidade,:valor,:obsevacao)");
        $insert->execute($produtinho);

        if ($insert->rowCount() > 0) {
            include 'menu.php';
            include 'pedidos.php';
        } else {
            echo "<br><br><br>ERRO novo!!!!!";
        }
    }
}
?>