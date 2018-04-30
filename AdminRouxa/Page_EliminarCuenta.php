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
            <link rel="stylesheet" href="../css/Stile.css">
    </head>
    <body>
        <?php
        // put your code here
        ?>
             <h1 id="top">Fabrica de Ropa</h1>
              <div class="buscador">
                    <p>
                     <input id="text" type="text" >
                     <input id="boton" type="submit" value="Buscar">
                    </p>
                 </div>
      
        <div class="container">
           <h1 id="letra1">
       Cuentas Registradas
           </h1>
           
        
         
         <form id="lista" action="AddProducto.php" method="POST">
              <p id="lista_top"> Nombre | Apellido | Correo | Nivel de acceso</p>
              
              <p  id="lista_item" >Nombre_x | Apellido_x | correo_x | nivel_x | 
               <input type="checkbox" id="checkbox"></p>
               <p  id="lista_item" >Nombre_x | Apellido_x | correo_x | nivel_x | 
               <input type="checkbox" id="checkbox"></p>
                                      
                               
                                
            <p><input id="boton2" type="submit" value="Eliminar cuenta(s)"></p>
        </form>
          
        </div>
        
    </body>
</html>
