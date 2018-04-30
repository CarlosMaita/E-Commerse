<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/Stile.css">
    </head>
    
    <body>
        <div class="page">
      
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
             <div class="container">
                <h1 id="letra1"> Indice de paginas</h1>     
                <h2 id="letra1">Inventario <a href="Page_Inventario.php">Aqui</a></h2>
                <h2 id="letra1">Añadir producto <a href="Page_AddProducto.php">Aqui</a></h2>
                  <h2 id="letra1">Busqueda de pedidos<a href="buscador_pedido.php">Aqui</a></h2>
                    <h2 id="letra1">Empaquetado de pedidos<a href="Empaquetado.php">Aqui</a></h2>
                      <h2 id="letra1">Envio de pedidos<a href="Envios.php">Aqui</a></h2>
                        <h2 id="letra1">Fallas de Sistema<a href="Falla.php">Aqui</a></h2>
                
                <h2 id="letra1"><a href="Cerrar_Session.php">Cerrar Session</a></h2>
                
             </div>
            <?php
        }else{
            //No hay acceso
            ?>
            
         <h1 id="top">Bienvenido a la Administracion de Rouxa</h1>
        <div class="container">
            
            <form action="index.php" method="POST">
            <p><input id="text" type="text" name="correo" placeholder="Nombre"></p>
            <p><input id="text" type="password" name="clave" placeholder="Clave"></p>
            <p><input id="boton" type="submit" value="Ingresar"></p>
        
        </form>
       
        </div>
           
            <?php
        }
        
        ?>
    
               
            <p>Creado por Eutuxia</p>
        </div>
    </body>
</html>
