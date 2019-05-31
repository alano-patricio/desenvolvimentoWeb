<?php
include './validaSessao.php';

$lTC = $pdo->prepare("SELECT * FROM tb_clientes");
$lTC->execute();
$listaTodosClientes = $lTC->fetchAll(PDO::FETCH_OBJ);

$ltopc = $pdo->prepare("SELECT tb_pedidos.id_pedido, tb_pedidos.data_hora, tb_clientes.nome, tb_clientes.id_cliente FROM tb_pedidos
LEFT JOIN tb_clientes ON tb_pedidos.id_cliente=tb_clientes.id_cliente");
$ltopc->execute();
$listaTodosPedidosCadastrados = $ltopc->fetchAll(PDO::FETCH_OBJ);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form action="index.php" method="POST">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for = "buscarCliente">Cliente</label><br>
            <select class = "selectpicker" data-width="fit" data-live-search="true" required name="buscarClientePedido" >     
                <option>Selecione um cliente</option>
                <?php foreach ($listaTodosClientes as $c) { ?>
                    <option value="<?php echo $c->id_cliente ?>"><?php echo $c->nome ?></option>
                <?php } ?>       
            </select>
        </div>
        <div class="form-group col-sm-5">
            <label>Observação</label>
            <textarea class="form-control" rows="1" name="observacaoClientePedido"></textarea>
        </div >

    </div> 
    <input type="submit" class="btn btn-success" name="cadastrarClienteParaFazerPedido" value="CADASTRAR PEDIDO">
</form>

<div class="row col-md-8">
    <br>        <label class="col-md-offset-5">Produtos cadastrados</label>
    <table class="table">
        <thead>
        <th scope="col">Nº Pedido</th>
        <th scope="col">Cliente</th>
        <th scope="col">Data do Pedido</th>
        </thead>
        <tbody> 
            <?php foreach ($listaTodosPedidosCadastrados as $l): ?>
                <tr>
                    <td width="20px"><?php echo $l->id_pedido; ?></td>
                    <td width="60%"><?php echo $l->nome; ?></td> 
                    <td width="20%"><?php echo $l->data_hora; ?></td>
                    <td width="20px">
                        <form name = "formPedidosExcluir<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                            <input type="hidden" name="excluirPedidoFinal" value="<?php echo $l->id_pedido; ?>">
                            <button type="submit" name="buttonExcluirPedidoFinal" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>  
                        </form>
                    </td>
                    <td>
                        <form name = "formPedidosPdf<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                            <input type="hidden" name="nomeClientePdf" value="<?php echo $l->id_cliente; ?>">
                            <input type="hidden" name="gerarPdf" value="<?php echo $l->id_pedido; ?>">
                            <button type="submit" name="enviaDadosPdf" style="font-size:24px; color:red"><i class="fa fa-file-pdf-o"></i></button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody> 
    </table>
</div>

<!--<i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i>-->
<br>

