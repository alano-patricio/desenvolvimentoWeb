
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap -->
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Início</title>

        <script src="ajax.js"></script>

    </head>
    <body>
        <div class="container-fluid col-lg-offset-1">
            <?php
            session_cache_limiter('private');
            $cache_limiter = session_cache_limiter();
            session_cache_expire(1);
            $cache_expire = session_cache_expire();
            
            session_start();
            if (isset($_POST['CLIENTES'])) {
                include('menu.php');
                include('clientes.php');
            } elseif (isset($_POST['PRODUTOS'])) {
                include('menu.php');
                include('produtos.php');
            } elseif (isset($_POST['PEDIDOS'])) {
                include('menu.php');
                include('pedidos.php');
            } elseif (isset($_POST['SAIR'])) {
                include ('logoff.php');
            } elseif (isset($_POST['validaLoginUsuario'])) {
                include('validalogin.php');
            } elseif (isset($_SESSION['LOGADO'])) {
                include ('menu.php');
            } else {
                include('login.php');
            }
            ?>
        </div>






        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="js/bootstrap.js"></script>
    </body>
</html>
