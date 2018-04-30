<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="Stile.css">
         <link rel="stylesheet" href="estilo1.css">
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        echo '<div>Welcome to Tienda web</div>';
               
        ?>
        
          <div class="page">
          <h1 id="top">Fabrica de Ropa</h1>
        <div class="container">
            
        <form action="Loggear.php" method="POST">
            <p>Correo <input id="text" type="text" name="correo"></p>
            <p>Clave <input id="text" type="password" name="clave"></p>
            <p><input id="boton" type="submit" value="Ingresar"></p>
        </form>
            
        <p id="red">La contraseña o Usuario ingresado no son validos</p>
        <h1 id="letra1">Si no esta registrado, haga click <a href="Page_registro.php">Aqui</a></h1>
        
        </div> 
        </div>
    </body>
</html>
