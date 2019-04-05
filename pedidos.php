<?php include './validaSessao.php'; ?>
<form action="action/insertCliente.php" method="POST">
    <div class="row">
        <div class="form-group col-sm-1">
            <label for="codigoPedido">Pedido</label>
            <input type="text" class="form-control" id="codigoPedido" name="codigoPedido">   
        </div>
        <div class="form-group col-sm-2">
            <label for="pedidoTelefone"> Telefone</label>
            <input type="text" class="form-control" id="pedidoTelefone" name="pedidoTelefone">
        </div>
        <div class="form-group col-sm-1">
            <label for="pedidoCodigoCliente"> Código Cliente</label>
            <input type="text" class="form-control" id="pedidoCodigoCliente" name="pedidoCodigoCliente">
        </div>
        <div class="form-group col-sm-4">
            <label for="pedidoNomeCliente"> Nome Cliente</label>
            <input type="text" class="form-control" id="pedidoNomeCliente" name="pedidoNomeCliente" value="Nome completo do cliente">
        </div>
    </div>

    <div class="row"> 
        <div class="form-group col-sm-4">
            <label for="pedidoEndereco">Endereço</label>
            <input type="text" class="form-control" id="pedidoEndereco" name="pedidoEndereco">
        </div>
        <div class="form-group col-sm-1">
            <label for="pedidoNumeroCasaCliente">Número</label>
            <input type="text" class="form-control" id="pedidoNumeroCasaCliente" name="pedidoNumeroCasaCliente">
        </div>

        <div class="form-group col-sm-1">
            <label for="pedidoCEPCliente">CEP</label>
            <input type="text" class="form-control" id="pedidoCEPCliente" name="pedidoCEPCliente">
        </div>

        <div class="form-group col-sm-1">
            <label for="pedidoBairroCliente">Bairro</label>
            <input type="text" class="form-control" id="pedidoBairroCliente" name="pedidoBairroCliente">
        </div>
        <div class="form-group col-sm-1">
            <label for="pedidoCidadeCliente">Cidade</label>
            <input type="text" class="form-control" id="pedidoCidadeCliente" name="pedidoCidadeCliente"">
        </div>
    </div>

    <div class="row">

        <div class="form-group col-sm-6">
            <label>Observação</label>
            <textarea class="form-control" value="Digite aqui sua observação de endereço" rows="1" name="pedidoObservacao"></textarea>
        </div>
        <div class="form-group col-sm-2">
            <label for="pedidoDataHora">Data/Hora Local</label>
            <input type="datetime-local" class="form-control" id="pedidoDataHora" name="pedidoDataHora"">
        </div>

    </div>
    <div class="row">
        <div class="form-group col-sm-1">
            <label>Produtos</label>    
        </div>
    </div>

    <div class="row">

        <div class="form-group col-sm-1">
            <label for="pedidoCodProduto">Produto</label>
            <input type="text" class="form-control" id="pedidoCodProduto" name="pedidoCodProduto">
        </div>

        <div class="form-group col-sm-2">
            <label for="pedidoDescricaoProduto">Descrição</label>
            <input type="text" class="form-control" id="pedidoDescricaoProduto" name="pedidoDescricaoProduto">
        </div>

        <div class="form-group col-sm-1">
            <label for="pedidoPrecoProduto">Preço</label>
            <input type="text" class="form-control" id="pedidoPrecoProduto" name="pedidoPrecoProduto">
        </div>

        <div class="form-group col-sm-1">
            <label for="pedidoQntProduto">Quantidade</label>
            <input type="text" class="form-control" id="pedidoQntProduto" name="pedidoQntProduto">
        </div>

        <div class="form-group col-sm-1">
            <label for="pedidoTotalProduto">Total R$</label>
            <input type="text" class="form-control" id="pedidoTotalProduto" name="pedidoTotalProduto">
        </div>

        <div class="form-group col-sm-2">
            <label for="pedidoObsProduto">Observação</label>
            <input type="text" class="form-control" id="pedidoObsProduto" name="pedidoObsProduto">
        </div>

    </div>



    <input type="submit" class="btn btn-success" name="cadastrarNovoCliente" value="CADASTRAR NOVO CLIENTE">

    <div class="row">
        <div class="form-group col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                        <th scope="col">Obs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pinos 3m/1pol/30cm</td>
                        <td>R$ 35,00</td>
                        <td>10</td>
                        <td>R$ 350,00</td>
                        <td>Nenhuma</td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>


</form>


