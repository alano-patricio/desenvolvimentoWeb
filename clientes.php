<?php include './validaSessao.php'; ?> 

<?php
if (isset($_POST['editarCadastro'])) {
    $lista_Produto = array('id' => $_POST['editarCadastro']);
    $pC = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = :id");
    $pC->execute($lista_Produto);
    $preencheClientes = $pC->fetch();
}
?>

<form action="index.php" method="POST">
    <div class="row">
        <div class="form-group col-sm-5">
            <label for="nomeCliente"> Nome Cliente</label>
            <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="<?php echo isset($preencheClientes['nome']) ? $preencheClientes['nome'] : ""; ?>">
        </div>
    </div>
    <div class="row"> 
        <div class="form-group col-sm-4">
            <label for="endereçoCliente">Endereço</label>
            <input type="text" class="form-control" id="endereçoCliente" name="enderecoCliente" value="<?php echo isset($preencheClientes['endereco']) ? $preencheClientes['endereco'] : ""; ?>">
        </div>
        <div class="form-group col-sm-1">
            <label for="numeroCliente">Número</label>
            <input type="text" class="form-control" id="numeroCliente" name="numeroCliente" value="<?php echo isset($preencheClientes['numero']) ? $preencheClientes['numero'] : ""; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-5">
            <label>Observação</label>
            <textarea class="form-control" rows="4" name="observacaoCliente"><?php echo isset($preencheClientes['telefone']) ? $preencheClientes['telefone'] : ""; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-1">
            <label for="cepCliente">CEP</label>
            <input type="text" class="form-control" id="cepCliente" name="cepCliente" value="<?php echo isset($preencheClientes['cep']) ? $preencheClientes['cep'] : ""; ?>">  
        </div>
        <div class="form-group col-sm-2">
            <label for="bairroCliente">Bairro</label>
            <input type="text" class="form-control" id="bairroCliente" name="bairroCliente" value="<?php echo isset($preencheClientes['bairro']) ? $preencheClientes['bairro'] : ""; ?>">  
        </div>
        <div class="form-group col-sm-1">
            <label for="cidadeCliente">Cidade</label>
            <input type="text" class="form-control" id="cidadeCliente" name="cidadeCliente" value="<?php echo isset($preencheClientes['cidade']) ? $preencheClientes['cidade'] : ""; ?>">  
        </div>
        <div class = "form-group col-sm-1">
            <label for = "estadoCliente">Estado</label>
            <select class = "form-control" id = "sel1" name="estadoCliente" >
                <option selected="selected"><?php echo isset($preencheClientes['estado']) ? $preencheClientes['estado'] : ""; ?></option>
                <option value = "AC">AC</option>
                <option value = "AL">AL</option>
                <option value = "AP">AP</option>
                <option value = "AM">AM</option>
                <option value = "BA">BA</option>
                <option value = "CE">CE</option>
                <option value = "DF">DF</option>
                <option value = "ES">ES</option>
                <option value = "GO">GO</option>
                <option value = "MA">MA</option>
                <option value = "MT">MT</option>
                <option value = "MS">MS</option>
                <option value = "MG">MG</option>
                <option value = "PA">PA</option>
                <option value = "PB">PB</option>
                <option value = "PR">PR</option>
                <option value = "PE">PE</option>
                <option value = "PI">PI</option>
                <option value = "RJ">RJ</option>
                <option value = "RN">RN</option>
                <option value = "RS">RS</option>
                <option value = "RO">RO</option>
                <option value = "RR">RR</option>
                <option value = "SC">SC</option>
                <option value = "SP">SP</option>
                <option value = "SE">SE</option>
                <option value = "TO">TO</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-2" >
            <label for="telefoneCliente">Telefone</label>
            <input type="tel" class="form-control" name="telefoneCliente" value="<?php echo isset($preencheClientes['telefone']) ? $preencheClientes['telefone'] : ""; ?>" >  
        </div>
        <div class="form-group col-sm-3">
            <label for="emailCliente">Email</label>
            <input type="email" class="form-control" id="emailCliente" name="emailCliente" value="<?php echo isset($preencheClientes['email']) ? $preencheClientes['email'] : ""; ?>">  
        </div>
    </div>

    <?php if (isset($preencheClientes['id_cliente'])) { ?>
        <input type="submit" class="btn btn-success" name="realizarAtualizacaoNoBanco" value="SALVAR">
        <input type="hidden" name="realizarAtualizacaoNoBancoComIdCliente" value="<?php echo $preencheClientes['id_cliente'] ?>">
    <?php } else { ?>
        <input type="submit" class="btn btn-success" name="realizarCadastroNoBanco" value="CADASTRAR CLIENTE">
    <?php } ?>



</form>


