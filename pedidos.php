<?php
include './validaSessao.php';

$puic = $pdo->prepare("SELECT id_pedido FROM tb_pedidos ORDER BY id_pedido DESC LIMIT 1");
$puic->execute();
$dadosIdPedido = $puic->fetch();

$preencheFormPedido = array('id_pedido' => $dadosIdPedido['id_pedido']);
$pop = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_pedido = :id_pedido");
$pop->execute($preencheFormPedido);
$dadosPedido = $pop->fetch();

$clientePreenche = array('id_cliente' => $dadosPedido['id_cliente']);
$popC = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = :id_cliente");
$popC->execute($clientePreenche);
$dadosClientePedido = $popC->fetch();


if (isset($_POST['adicionaProdutoNoPedido'])) {
    $pcppi = $pdo->prepare("SELECT * FROM tb_produtos WHERE descricao LIKE :descricao");
    $pcppi->bindValue(':descricao', '%%' . $_POST['pegaOtextoParaPassarParaLa'] . '%');
    $pcppi->execute();
    $produtosAserInseridos = $pcppi->fetchAll(PDO::FETCH_OBJ);
}

$popleB = $pdo->prepare("SELECT tb_pedido_produtos.id_produto, tb_produtos.descricao, tb_pedido_produtos.valor, tb_pedido_produtos.quantidade, tb_pedido_produtos.observacao FROM tb_pedido_produtos
INNER JOIN tb_produtos ON tb_produtos.id_produto=tb_pedido_produtos.id_produto WHERE tb_pedido_produtos.id_pedido = :id_pedido");
$popleB->execute($preencheFormPedido);
$populaOsProdutosLaEmBaixo = $popleB->fetchAll(PDO::FETCH_OBJ);
?>


<div class="row">
    <div class="form-group col-sm-1">
        <label for="codigoPedido">Pedido</label>
        <input type="text" readonly class="form-control" id="codigoPedido" name="codigoPedido" value="<?php echo $dadosPedido['id_pedido'] ?>">   
    </div>
    <div class="form-group col-sm-2">
        <label for="pedidoTelefone"> Telefone</label>
        <input type="text" readonly class="form-control" id="pedidoTelefone" name="pedidoTelefone" value="<?php echo $dadosClientePedido['telefone'] ?>">
    </div>
    <div class="form-group col-sm-1">
        <label for="pedidoCodigoCliente"> Código Cliente</label>
        <input type="text" readonly class="form-control" id="pedidoCodigoCliente" name="pedidoCodigoCliente" value="<?php echo $dadosPedido['id_cliente'] ?>">
    </div>
    <div class="form-group col-sm-4">
        <label for="pedidoNomeCliente"> Nome Cliente</label>
        <input type="text" readonly class="form-control" id="pedidoNomeCliente" name="pedidoNomeCliente" value="<?php echo $dadosClientePedido['nome'] ?>">
    </div>
</div>

<div class="row"> 
    <div class="form-group col-sm-4">
        <label for="pedidoEndereco">Endereço</label>
        <input type="text" readonly class="form-control" id="pedidoEndereco" name="pedidoEndereco" value="<?php echo $dadosClientePedido['endereco'] ?>">
    </div>
    <div class="form-group col-sm-1">
        <label for="pedidoNumeroCasaCliente">Número</label>
        <input type="text" readonly class="form-control" id="pedidoNumeroCasaCliente" name="pedidoNumeroCasaCliente" value="<?php echo $dadosClientePedido['numero'] ?>">
    </div>

    <div class="form-group col-sm-1">
        <label for="pedidoCEPCliente">CEP</label>
        <input type="text" readonly class="form-control" id="pedidoCEPCliente" name="pedidoCEPCliente" value="<?php echo $dadosClientePedido['cep'] ?>">
    </div>

    <div class="form-group col-sm-1">
        <label for="pedidoBairroCliente">Bairro</label>
        <input type="text" readonly class="form-control" id="pedidoBairroCliente" name="pedidoBairroCliente" value="<?php echo $dadosClientePedido['bairro'] ?>">
    </div>
    <div class="form-group col-sm-1">
        <label for="pedidoCidadeCliente">Cidade</label>
        <input type="text" readonly class="form-control" id="pedidoCidadeCliente" name="pedidoCidadeCliente" value="<?php echo $dadosClientePedido['cidade'] ?>">
    </div>
</div>

<div class="row">

    <div class="form-group col-sm-6">
        <label>Observação</label>
        <textarea readonly class="form-control" rows="1" name="pedidoObservacao"><?php echo $dadosPedido['observacao'] ?></textarea>
    </div>
    <div class="form-group col-sm-2">
        <label for="pedidoDataHora">Data/Hora</label>
        <input type="datetime" readonly class="form-control" id="pedidoDataHora" name="pedidoDataHora" value="<?php echo $dadosPedido['data_hora'] ?>">
    </div>

</div>

<form action="index.php" method="POST">
    <?php $valorTotal ?>

    <div class="row">

        <div class="col-sm-3">
            <label for="pegaOtextoParaPassarParaLa">Pesquisa de Produto</label>
            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-btn">

                        <input class="form-control" type="text" id="pegaOtextoParaPassarParaLa" name="pegaOtextoParaPassarParaLa" placeholder="Digite nome do produto" />
                        <button name="adicionaProdutoNoPedido" class="btn btn-default" type="submit">Buscar</button>
                    </div>
                </div>
                <input type="hidden" name="recebeIdDoPedidoQueNaoParaDeAumentar" value="<?php echo $dadosPedido['id_pedido'] ?>">
            </div>
        </div>

        <div class="col-md-offset-3 col-sm-2">
            <label for="valorTotalPedido">Total</label>
            <div class="form-group">
                <?php
                foreach ($populaOsProdutosLaEmBaixo as $l):
                    $subtotal = $l->quantidade * $l->valor;
                    @$total += $subtotal;
                endforeach;
                ?>
                <input class="form-control" type="text" id="valorTotalPedido" name="valorTotalPedido" value="R$ <?php echo @$total ?>" />
            </div>
        </div>

    </div>
</form>






<?php if (isset($produtosAserInseridos)) { ?>


    <div class="row col-md-8">
        <table class="table ">
            <thead>
            <th scope="col">Codigo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Observacao</th>
            <th scope="col">Imagem</th>
            </thead>

            <?php foreach ($produtosAserInseridos as $l): ?>
                <form name = "form<?php echo $l->id_produto; ?>" action="index.php" method="POST">  

                    <tbody> 
                        <tr>

                            <td width="20px"><?php echo $l->id_produto; ?></td>
                            <td width="70%"><?php echo $l->descricao; ?></td> 
                            <td width="5%"><?php echo $l->valor; ?></td>
                            <td width="1%"><input type="text" name="quantidadeProdutos"></td>
                            <td width="4%"><input type="text" name="observacaoProdutos"></td>
                            <td width="10%"><img src="<?php echo $l->imagem; ?>" class="img-responsive previewNoticia"></td>
                            <td width="20px">

                                <input type="hidden" name="idProduto" value="<?php echo $l->id_produto; ?>">
                                <input type="hidden" name="idPedido" value="<?php echo $dadosPedido['id_pedido']; ?>">
                                <input type="hidden" name="valor" value="<?php echo $l->valor; ?>">
                                <button name="AddProduto" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>  
                            </td>

                        </tr>
                    </tbody> 
                </form>
            <?php endforeach; ?>

        </table>
    </div>


<?php } ?>

<?php if (isset($populaOsProdutosLaEmBaixo)) { ?>

    <div class="row col-md-8">
        <br>        <label class="col-md-offset-5">Produtos cadastrados</label>
        <table class="table">
            <thead>
            <th scope="col">Codigo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">SubTotal</th>
            <th scope="col">Observacao</th>

            </thead>
            <tbody> 
                <?php foreach ($populaOsProdutosLaEmBaixo as $l): ?>
                    <tr>
                        <td width="20px"><?php echo $l->id_produto; ?></td>
                        <td width="70%"><?php echo $l->descricao; ?></td> 
                        <td width="5%"><?php echo $l->valor; ?></td>
                        <td width="1%"><?php echo $l->quantidade; ?></td>
                        <td width="4%"><?php echo $l->quantidade * $l->valor; ?></td>
                        <td width="10%"><?php echo $l->observacao; ?></td>
                        <td width="20px">



                            <form name = "formPedidosListaEditar<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                                <input type="hidden" name="editarProdutoDaLista" value="<?php echo $l->id_produto; ?>">
                                <input type="hidden" name="recebeIdLegal" value="<?php echo $dadosPedido['id_pedido'] ?>">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button>  
                            </form></td>
                        <td>
                            <form name = "formPedidosListaExcluir<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                                <input type="hidden" name="excProdutoList" value="<?php echo $l->id_produto; ?>">
                                <input type="hidden" name="excluirPedidoDaLista" value="<?php echo $dadosPedido['id_pedido'] ?>">
                                <button type="submit" name="excluirProdutoDaLista" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>  
                            </form></td>
                    </tr>

                <?php endforeach; ?>
            </tbody> 
        </table>
        <form action="index.php" method="POST">
            <button type="submit" name="FinalizarPedido" class="btn btn-success col-sm-2"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Gravar</span></button>
        </form>
    </div>
<?php } ?>





