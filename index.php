<!DOCTYPE html>
<?php include 'banco/conectaBanco.php'; ?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-select.min.css" rel="stylesheet">
        <script src="js/jquery-3.3.1.min.js"></script>   
        <title>Início</title>

    </head>
    <body>
        <div class="container-fluid col-lg-offset-1">
            <?php
            session_start();

            if ((time() - $_SESSION['last_login_timestamp']) > 6000) {
                header("location: logoff.php");
            }

            if (isset($_POST['CLIENTES'])) {
                include('menu.php');
                include('listarClientes.php');
            } elseif (isset($_POST['PRODUTOS'])) {
                include('menu.php');
                include('listarProdutos.php');
            } elseif (isset($_POST['cadastrarNovoCliente'])) {
                include('menu.php');
                include('clientes.php');
            } elseif (isset($_POST['cadastrarNovoProduto'])) {
                include('menu.php');
                include('produtos.php');
            } elseif (isset($_POST['editarCadastro'])) {
                include('menu.php');
                include('clientes.php');
            } elseif (isset($_POST['editarProduto'])) {
                include('menu.php');
                include('produtos.php');
            } elseif (isset($_POST['PEDIDOS'])) {
                include('menu.php');
                include('prePedidos.php');
            } elseif (isset($_POST['SAIR'])) {
                include ('logoff.php');
            } elseif (isset($_POST['validaLoginUsuario'])) {
                include('validalogin.php');
            } elseif (isset($_POST['realizarCadastroNoBanco'])) {
                include ('action/inserir.php');
            } elseif (isset($_POST['realizarAtualizacaoNoBanco'])) {
                include ('action/editar.php');
            } elseif (isset($_POST['realizarExclusaoNoBanco'])) {
                include ('action/excluir.php');
            } elseif (isset($_POST['gravarNovoProduto'])) {
                include ('action/inserir.php');
            } elseif (isset($_POST['editarNovoProduto'])) {
                include ('action/editar.php');
            } elseif (isset($_POST['excluirProduto'])) {
                include ('action/excluir.php');
            } elseif (isset($_POST['cadastrarClienteParaFazerPedido'])) {
                include ('action/inserir.php');
            } elseif (isset($_POST['adicionaProdutoNoPedido'])) {
                include ('menu.php');
                include ('pedidos.php');
            } elseif (isset($_POST['AddProduto'])) {
                include ('action/inserir.php');
            } elseif (isset($_POST['editarProdutoDaLista'])) {
                include ('editarProdutoPedido.php');
            } elseif (isset($_POST['editarProdutoNoPedido'])) {
                include ('action/editar.php');
            } elseif (isset($_POST['excluirProdutoDaLista'])) {
                include ('action/excluir.php');
            } elseif (isset($_POST['FinalizarPedido'])) {
                include ('menu.php');
                include ('prePedidos.php');
            } elseif (isset($_POST['buttonExcluirPedidoFinal'])) {
                include ('action/excluir.php');
            } elseif (isset($_POST['enviaDadosPdf'])) {
                $_SESSION['id_pedido'] = $_POST['gerarPdf'];
                $_SESSION['id_cliente'] = $_POST['nomeClientePdf'];
                header("location: gerarPdf.php");
            } elseif (isset($_SESSION['LOGADO'])) {
                include ('menu.php');
            } else {
                include('login.php');
            }
            ?>
        </div>







        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="js/bootstrap.min.js"></script>
        <!--Bootstrap select-->
        <script src="js/bootstrap-select.min.js"></script>
    </body>
</html>
