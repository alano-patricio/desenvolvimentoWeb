<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body id="body-login">
        <div class="box">
            <h2>Área de Login</h2>
            <?php echo ((@$error) ? "Usuário ou senha não coincidem" : "") ?>
            <form action="index.php" method="POST">
                <div class="inputBox">
                    <input type="text" name="user" required="">
                    <label>Nome</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" required="">
                    <label>Senha</label>
                </div>                   
                <input type="submit" name="validaLoginUsuario" value="Login">

            </form>

        </div>
        <!--div do box1--> 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="js/bootstrap.js"></script>
    </body>
</html>