<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php
        // put your code here
        session_start();

        if(isset($_SESSION['ACCESO'])){
            if ($_SESSION['ACCESO']==TRUE){
        
        ?>
        
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="../css/Stile.css">
    <link rel="stylesheet" href="../css/estilo1.css">

    <body>
       
        <div class="container">
         <h1 id="letra1">
         Nuevo Producto
         </h1>
         
           <form action="AddProducto.php" method="POST" enctype="multipart/form-data">
            <p><input id="text" type="text" name="nombre_p" placeholder="Nombre de producto" autocomplete="off"></p>
                        
           <p><textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripcion" maxlength="250"></textarea></p>
           <p><input id="text" type="color" name="color"></p>
           
           <p><input id="text" type="number" name="precio" placeholder="Precio [Bs]"></p> 
           
           <p>Imagen Principal (Menor a 500 kbyte) <input type="file" name="archivo" ></p>
           <p><input id="boton" type="submit" value="Añadir"></p>
        </form>
          
        </div>
      
    </body>
</html>
<?php 
      }
            }else{
            
            include('index.php');
        }
        
        ?>    