<?php include './validaSessao.php'; ?>


<div class = "row">
    <nav class = "navbar">

        <form name="crono" action="index.php" method = "POST">
            <div class = " navbar-brand ">
                <input type = "submit" class = "btn btn-primary" name = "CLIENTES" value = "CLIENTES">
                <input type = "submit" class = "btn btn-primary" name = "PRODUTOS" value = "PRODUTOS">
                <input type = "submit" class = "btn btn-primary" name = "PEDIDOS" value = "PEDIDOS">
                <input type = "submit" class = "btn btn-primary" name = "SAIR" value = "SAIR">
                <input type = "button" class = "btn btn-primary" name = "face" title="Cronómetro" >
            <script language="JavaScript">
                <!-- 
                var timeCrono;
                var hor = 0;
                var min = 0;
                var seg = 0;
                var startTime = new Date();
                var start = startTime.getSeconds();
                StartCrono();
                function StartCrono() {
                    if (seg + 1 > 59) {
                        min += 1;
                    }
                    if (min > 59) {
                        min = 0;
                        hor += 1;
                    }
                    var time = new Date();
                    if (time.getSeconds() >= start) {
                        seg = time.getSeconds() - start;
                    }
                    else {
                        seg = 60 + (time.getSeconds() - start);
                    }
                    timeCrono = (hor < 10) ? "0" + hor : hor;
                    timeCrono += ((min < 10) ? ":0" : ":") + min;
                    timeCrono += ((seg < 10) ? ":0" : ":") + seg;
                    document.crono.face.value = timeCrono;
                    setTimeout("StartCrono()", 1000);
                } //--> 
            </script>
            </div> </form>
        
    </nav>
</div>









