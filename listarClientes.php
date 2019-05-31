<?php
include './validaSessao.php';

$rs = $pdo->prepare("SELECT id_cliente,nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email FROM tb_clientes");
$rs->execute();
$listarCliente = $rs->fetchAll(PDO::FETCH_OBJ);
?>
<div class="row col-md-11">
    <table class="table ">
        <thead>
        <th scope="col">Cod</th>
        <th scope="col">Nome</th>
        <th scope="col">Endereco</th>
        <th scope="col">Numero</th>
        <!--<th scope="col">Observacao</th>-->
        <th scope="col">CEP</th>
        <th scope="col">Bairro</th>
        <th scope="col">Cidade</th>
        <th scope="col">Estado</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        </thead>
        <tbody> 
            <?php foreach ($listarCliente as $l): ?>
                <tr>
                    <td><?php echo $l->id_cliente; ?></td>
                    <td><?php echo $l->nome; ?></td>
                    <td><?php echo $l->endereco; ?></td>
                    <td><?php echo $l->numero; ?></td>
                    <td><?php echo $l->cep; ?></td>
                    <td><?php echo $l->bairro; ?></td>
                    <td><?php echo $l->cidade; ?></td>
                    <td><?php echo $l->estado; ?></td>
                    <td><?php echo $l->telefone; ?></td>
                    <td><?php echo $l->email; ?></td>
                    <td>
                        <form name = "form<?php echo $l->id_cliente; ?>"action="index.php" method="POST">
                            <input type="hidden" name="editarCadastro" value="<?php echo $l->id_cliente; ?>">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button>  
                        </form></td>
                    <td>
                        <form name = "formExcluir<?php echo $l->id_cliente; ?>"action="index.php" method="POST">
                            <input type="hidden" name="realizarExclusaoNoBanco" value="<?php echo $l->id_cliente; ?>">
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>  
                        </form></td>
                </tr>

            <?php endforeach; ?>
        </tbody> 
    </table>
    <form action="index.php" method="POST">
        <input type="submit" class="btn btn-success" name="cadastrarNovoCliente" value="CADASTRAR NOVO CLIENTE"> 
    </form>

</div>


