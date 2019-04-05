<?php include './validaSessao.php'; ?>
<form action="action/insertProduto.php" method="POST">
    <div class="row">
        <div class="form-group col-sm-1">
            <label for="codigoProduto">Código</label>
            <input type="text" class="form-control" id="codigoProduto" name="codigoProduto">   
        </div>
        <div class="form-group col-sm-4">
            <label for="descricaoProduto"> Descrição do Produto</label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto">
        </div>
    </div>
    <div class="row"> 
        <div class="form-group col-sm-1">
            <label for="precoProduto">Preço</label>
            <input type="text" class="form-control" id="precoProduto" name="precoProduto">
        </div>
        <div class="form-group col-sm-1">
            <label for="fotoProtudo">Foto</label>
            <input type="file" class="btn btn-primary" name="fotoProtudo" value="Escolher arquivo">
        </div>
        </div>

    <input type="submit" class="btn btn-success" name="gravarNovoProduto" value="GRAVAR">

</form>


