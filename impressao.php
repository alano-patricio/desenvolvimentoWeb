<?php
$AddprodutosNaLista = array('id_pedido' => $_POST['gerarPdf']);
$ltopc = $pdo->prepare("SELECT tb_pedido_produtos.id_produto, tb_pedido_produtos.quantidade, tb_pedido_produtos.valor, tb_produtos.descricao FROM tb_pedido_produtos LEFT JOIN tb_produtos ON tb_produtos.id_produto=tb_pedido_produtos.id_produto WHERE tb_pedido_produtos.id_pedido = :id_pedido");
$ltopc->execute($AddprodutosNaLista);
$listaTodosPedidosCadastrados = $ltopc->fetchAll(PDO::FETCH_OBJ);

$dataPedido = $pdo->prepare("SELECT * FROM tb_pedidos where id_pedido = :id_pedido");
$dataPedido->execute($AddprodutosNaLista);
$listarData = $dataPedido->fetch();

$AddDadosClienteNaLista = array('id_cliente' => $_POST['nomeClientePdf']);
$rs = $pdo->prepare("SELECT * FROM tb_clientes where id_cliente = :id_cliente");
$rs->execute($AddDadosClienteNaLista);
$listarClientes = $rs->fetch();
?>



<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1 class="text-center"><center>PatricioSoluções</center></h1>
        <div class="col-sm-12" style="background-color:black;"></div>
        <h2><center>Pedido</center></h2>

        <div class="row">
            <div class="col-md-3 pull-right">
                <h3>Data: <?php echo $listarData['data_hora']  ?></h3>
            </div>
        </div>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Dados Fornecedor</h3>
                <label>Empresa: Comercio PatricioSoluções LTDA</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>CNPJ: 38.507.121/0001-05</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Estado: SC</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Cidade: Lages</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Bairro: Centro</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Rua: Presidente Nereu Ramos</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Numero: 9</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Telefone: 49999698837</label>
            </div>
        </div>
        <br>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Dados Cliente</h3>
                <label>Empresa: <?php echo $listarClientes['nome'] ?></label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <label>CEP: <?php echo $listarClientes['cep'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Estado: <?php echo $listarClientes['estado'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Cidade: <?php echo $listarClientes['cidade'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Bairro: <?php echo $listarClientes['bairro'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Rua: <?php echo $listarClientes['endereco'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Numero: <?php echo $listarClientes['numero'] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Telefone: <?php echo $listarClientes['telefone'] ?></label>
            </div>
        </div>
        <br>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Produtos</h3>

            </div>
        </div>
        <table class="table ">
            <thead>
            <th scope="col">Cod</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor Unitario</th>
            <th scope="col">Subtotal</th>
        </thead>
        <tbody> 
            <?php foreach ($listaTodosPedidosCadastrados as $l): ?>
                <tr>
                    <td><?php echo $l->id_produto; ?></td>
                    <td><?php echo $l->descricao; ?></td>
                    <td><?php echo $l->quantidade; ?></td>
                    <td><?php echo $l->valor; ?></td>
                    <td><?php echo $l->quantidade * $l->valor; ?></td>             
                </tr>

            <?php endforeach; ?>
        </tbody> 
    </table>
</body>
</html>







