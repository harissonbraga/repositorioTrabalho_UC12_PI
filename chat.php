<?php
$con = mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('chat', $con) or die (mysql_error());
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/chat.css">
        <script type="text/javascript">
            function Nova() {
                setTimeout("window.location='chat.php'", 10);
            }
        </script>
    </head>
    <body>
        <div class="container">
            <center>
                <div class="superior">
                    <?php
                    $np = @mysqli_query("SELECT * FROM mensagens");
                    while ($ln = mysqli_fetch_array($np)) {
                        $usuario = $ln['usuario'];
                        $mensagem = $ln['mensagem'];
                        echo"<br>$usuario : $mensagem";
                    }
                    ?>		   
                </div>
                <div class="campos">
                    <form action="enviar.php" method="post">
                        <input type="text" name="usuario" placeholder="Usuario">
                        <input type="text" name="mensagem" placeholder="Mensagens">
                        <input type="submit" name="enviar" Onclick="Nova()">

                    </form>
                </div>
            </center>s
            <div>
            </body> 
                </html>
