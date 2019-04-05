<?php include './validaSessao.php'; ?>    
<form action="action/insertCliente.php" method="POST">
        <div class="row">
            <div class="form-group col-sm-1">
                <label for="codigoCliente">Código</label>
                <input type="text" class="form-control" id="codigoCliente" name="codigoCliente">   
            </div>
            <div class="form-group col-sm-4">
                <label for="nomeCliente"> Nome Cliente</label>
                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente">
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-sm-4">
                <label for="endereçoCliente">Endereço</label>
                <input type="text" class="form-control" id="endereçoCliente" name="endereçoCliente">
            </div>
            <div class="form-group col-sm-1">
                <label for="numeroCliente">Número</label>
                <input type="text" class="form-control" id="numeroCliente" name="numeroCliente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-5">
                <label>Observação</label>
                <textarea class="form-control" rows="4" name="observacaoCliente"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-1">
                <label for="cepCliente">CEP</label>
                <input type="text" class="form-control" id="cepCliente" name="cepCliente">  
            </div>
            <div class="form-group col-sm-2">
                <label for="bairroCliente">Bairro</label>
                <input type="text" class="form-control" id="bairroCliente" name="bairroCliente">  
            </div>
            <div class="form-group col-sm-1">
                <label for="cidadeCliente">Cidade</label>
                <input type="text" class="form-control" id="cidadeCliente" name="cidadeCliente">  
            </div>
            <div class="form-group col-sm-1">
                <label for="estadoCliente">Estado</label>
                <input list="estadoCliente" class="form-control" name="estadoCliente">
                <datalist id="estadoCliente">
                    <option value="R$ 10,00">
                    <option value="R$ 20,00">
                    <option value="R$ 30,00">
                </datalist>
            </div>
             </div>
            <div class="row">
                <div class="form-group col-sm-2">
                    <label for="telefoneCliente">Telefone</label>
                    <input type="telefoneCliente" class="form-control" id="telefoneCliente" name="telefoneCliente">  
                </div>
                <div class="form-group col-sm-3">
                    <label for="emailCliente">Email</label>
                    <input type="emailCliente" class="form-control" id="emailCliente" name="emailCliente">  
                </div>
            </div>
        <input type="submit" class="btn btn-success" name="cadastrarNovoCliente" value="CADASTRAR NOVO CLIENTE">
        
    </form>
       

