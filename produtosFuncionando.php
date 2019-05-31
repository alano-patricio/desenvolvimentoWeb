<?php
include './validaSessao.php';

if (isset($_POST['editarProduto'])) {
    $lista_Produto = array('id' => $_POST['editarProduto']);
    $pP = $pdo->prepare("SELECT * FROM tb_produtos WHERE id_produto =:id");
    $pP->execute($lista_Produto);
    $preencheProduto = $pP->fetch();
}
?>

<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="descricaoProduto"> Descrição do Produto</label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" value="<?php echo isset($preencheProduto['descricao']) ? $preencheProduto['descricao'] : '' ?>">
        </div>
        <div class="form-group col-sm-1">
            <label for="precoProduto">Preço</label>
            <input type="text" class="form-control" id="precoProduto" name="precoProduto" value="<?php echo isset($preencheProduto['valor']) ? $preencheProduto['valor'] : '' ?>">
        </div>
    </div>
    <div class="row"> 

        <div class="form-group col-sm-1">
            <label for="fotoProtudo">Foto</label>
            <?php echo isset($_POST['editarProduto']) ? '<input type="file" class="btn btn-primary" name="fotoProduto">' :
                    '<input type="file" required class="btn btn-primary" name="fotoProduto">'
            ?>
        </div>
        <?php echo isset($_POST['editarProduto']) ? '<div class="panel-body  col-md-offset-2 col-md-2">
            <div id="noticia1">
                <img src="upload/' . $preencheProduto['imagem'] . ' " class=" img-responsive previewNoticia">
                  <input type="hidden" name="nomeImagemAntiga" value="'. $preencheProduto['imagem'] .'">
    </div>
</div>' : '' ?>
        


</div>
<div class="row">
    <div class="col-sm-5">
        <div class="pull-right">

<?php if (isset($preencheProduto)) { ?>
                <input type="submit" class="btn btn-success" name="editarNovoProduto" value="GRAVAR">
                <input type="hidden" name="realizarAtualizacaoNoBancoComIdProduto" value="<?php echo $preencheProduto['id_produto'] ?>">
            <?php } else { ?>
                <input type="submit" class="btn btn-success" name="gravarNovoProduto" value="GRAVAR">
<?php } ?>  
        </div>
    </div>
</div>
</form>


