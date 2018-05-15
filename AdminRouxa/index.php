<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title></title>
      <link rel="stylesheet" href="../css/StyleAdmin.css">
    </head>
    
    <body>
       
        <?php
            
            // put your code here
        if(isset($_POST['correo'])){
            
            
            if($_POST['correo']!=null && $_POST['clave']!=null){
                
            $user=$_POST['correo'];
            $clave=$_POST['clave'];
            
            include('../Common/conexion.php');
            
             $sql= "select * from USUARIO where CORREO='$user'";
            
             $res = $conn->query($sql);
             if ($row=$res->fetch_assoc()) {
                 //usuario registrado
                 $clave=md5($clave);
                 if ($clave==$row['CLAVE']){
                     //usuario loggeado
                     $_SESSION['ACCESO']=TRUE;
                    
                  
               
                     
                 }else{
                     //contraseña incorrecta
                      echo  '<div class="container">
                       <p>Contraseña incorrecta</p>
                      </div>';
                     session_destroy();
                     
                 } 
                     
                 
                 
             }else {
                 //No existe Usuario registrado con este correo
              echo   '
                <div class="container">
                    <p>Usuario no Registrado</p>
                </div>';
              session_destroy();   
                 
             }
            
            }
        }
            
        if (isset($_SESSION['ACCESO'])){
            //hay acceso 
            ?>
             <div class="page1">
             <h1 id="block-main"> Indice de paginas</h1>     
                <h2 id="block"><a href="Page_Inventario.php">Inventario</a></h2>
                <h2 id="block"><a href="Page_AddProducto.php">Añadir producto</a></h2>
                  <h2 id="block"><a href="buscador_pedido.php">Busqueda de pedidos</a></h2>
                    <h2 id="block"><a href="Empaquetado.php">Empaquetado de pedidos</a></h2>
                      <h2 id="block"><a href="Envios.php">Envio de pedidos</a></h2>
                        <h2 id="block"><a href="Falla.php">Fallas de Sistema</a></h2>
                
                <h2 id="block-close"><a href="Cerrar_Session.php">Cerrar Session</a></h2>
                
             </div>
            <?php
        }else{
            //No hay acceso
            ?>
            
        <div class="page2">
        
             <h1 id="top">Bienvenido a la Administración de Rouxa</h1>
            <form  class="casillero" action="index.php" method="POST">
            
            <input id="text" type="text" name="correo" placeholder="Usuario">
            <input id="text" type="password" name="clave" placeholder="Contraseña">
            <input id="boton-casillero" type="submit" value="Entrar">
            </form>
        </div>
           
            <?php
        }
        
        ?>
    
    </body>
</html>
