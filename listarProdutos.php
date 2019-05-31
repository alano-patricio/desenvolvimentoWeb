<?php
include './validaSessao.php';
$rs = $pdo->prepare("SELECT * FROM tb_produtos");
$rs->execute();
$listarProdutos = $rs->fetchall(PDO::FETCH_OBJ);
?>
<div class="row col-md-11">
    <table class="table ">
        <thead>
        <th scope="col">Codigo</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Imagem</th>
        </thead>
        <tbody> 
            <?php foreach ($listarProdutos as $l): ?>
                <tr>
                    <td width="20px"><?php echo $l->id_produto; ?></td>
                    <td width="75%"><?php echo $l->descricao; ?></td> 
                    <td width="5%"><?php echo $l->valor; ?></td>
                    <td width="10%"><img src="<?php echo $l->imagem; ?>" class="img-responsive previewNoticia"></td>
                    <td width="20px">

                        <form name = "form<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                            <input type="hidden" name="editarProduto" value="<?php echo $l->id_produto; ?>">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button>  
                        </form></td>
                    <td>
                        <form name = "formExcluir<?php echo $l->id_produto; ?>"action="index.php" method="POST">
                            <input type="hidden" name="excluirProduto" value="<?php echo $l->id_produto; ?>">
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>  
                        </form></td>
                </tr>

            <?php endforeach; ?>
        </tbody> 
    </table>
    <form action="index.php" method="POST">
        <input type="submit" class="btn btn-success" name="cadastrarNovoProduto" value="CADASTRAR NOVO PRODUTO"> 
    </form>

</div>


