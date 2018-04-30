 <?php
             // put your code here  
        session_start();

require_once ('Common/mercadopago.php');

$mp = new MP('677284083290958', 'qKu7qUKA72vSpmnQfScH7WNCovUvRznx');

$mp->sandbox_mode(FALSE);           

if ($_POST){
    
$_SESSION['nombre-cliente']=$_POST['nombre-cliente'];
$_SESSION['telf-cliente']=$_POST['telf-cliente'];
$_SESSION['email-cliente']=$_POST['email-cliente']; 
$_SESSION['razon-social']=$_POST['razon-social'];  
$_SESSION['type-identidad']=$_POST['type-identidad'];  
$_SESSION['doc-identidad']=$_POST['doc-identidad'];
$_SESSION['dir-fiscal']=$_POST['dir-fiscal'];

//datos de envio    
$_SESSION['receptor']=$_POST['receptor'];
$_SESSION['type-identidad-receptor']=$_POST['type-identidad-receptor'];
$_SESSION['doc-identidad-receptor']=$_POST['doc-identidad-receptor'];    
$_SESSION['telf-receptor']=$_POST['telf-receptor'];   
    
//direccion
$_SESSION['pais']=$_POST['pais'];
$_SESSION['estado']=$_POST['estado'];
$_SESSION['ciudad']=$_POST['ciudad'];
$_SESSION['municipio']=$_POST['municipio'];  
$_SESSION['parroquia']=$_POST['parroquia'];      
$_SESSION['direccion']=$_POST['direccion'];
$_SESSION['ref']=$_POST['ref'];
$_SESSION['codigo-postal']=$_POST['codigo-postal'];      

include 'Comprar.php';
}




?>
  <html>
   <head>
        <meta charset="UTF-8">
         <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <title>Compra</title>
            <title>Rouxa</title>
           <link rel="stylesheet" href="css/Stile.css">
             <link rel="shortcut icon" href="imagen/Logo_principal.ico">
    </head>
           
      <script>
          
        function validacion(){
    
    var s1=document.getElementById('titular').value;
    var s2=document.getElementById('doc-identidad').value;
    var s3=document.getElementById('correo').value;
    var s4=document.getElementById('bancoE').value;
    var s5=document.getElementById('bancoR').value;
    var s6=document.getElementById('ref').value;        
            
    if (s1==null || s1.length==0){
        alert("Por favor, registre el nombre del titular de la cuenta bancaria.");
        return false;
    }
    else if (s2==null|| s2.length==0){
        alert("Por favor, registre su documento de identidad.");
        return false;
    }
    else if (s3==null|| s3.length==0){
       alert("Por favor, registre un correo electronico de contacto.");
        return false;
    }
    else if (s4==null|| s4.length==0){
        alert("Por favor, registre el banco emisor(Desde donde nos ha transferido).");
        return false;
    }        
    else if (s5==null|| s5.length==0){
         alert("Por favor, registre el banco receptor(A que banco nos ha transferido).");
        return false;
    }
    else if (s6==null|| s6.length==0){
         alert("Por favor, registre el numero de referencia bancaria.");
        return false;
    }
    
            
    return true;
}    
        </script>
    <body>
        <div class="page">
        <div class="container">
            <p class="texto-msn-MP"> Usted ha realizado la solicitud de compra de los productos que se muestran en la lista con el IDCOMPRA* que se muestra. Para continuar, realice el pago total del carrito de compras a traves de la plataforma de cobranza Mercado pago.<br>
                               
             <br>(*) Para conocer el estatus de su pedido inserte el IDCOMPRA en la ventana de seguimiento, ubicado en la pestaña "Compras" en  el menu principal. El IDCOMPRA fue enviado al correo registrado en los datos de cliente. </p>     
             <p id="idcompra">                   
           IDCOMPRA: <?PHP 
                 if($_POST){
                     echo md5($CS); 
                 }else{
                     echo 'error';
                 }
                 ?>
            </p>
                   
           
             <ul class="carrito-compras">
            <li>
                <ul id="linea-main">
                <li>...</li>
                <li>Producto</li>
                <li>IDproducto</li>
                <li>Talla</li>
                <li>Cantidad</li>
                <li>...</li>
                </ul>
            </li>
          
                  <?php
       if(isset($_SESSION['carrito'])){
           $datos=$_SESSION['carrito'];
           $total=0;
         
           for($i=0;$i<count($datos);$i++){
             ?>
            <li>
                <ul id="linea-articulo">
                    <li></li>
                        <li><?php echo $datos[$i]['Nombre'];?></li>
                        <li><?php echo $datos[$i]['Talla']?></li>
                        <li><?php echo $datos[$i]['Precio'];?></li>
                        <li><?php echo $datos[$i]['Cantidad'];?></li>
                        <li></li>
                </ul>
                
                
            </li>
          <?php  $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
               
           } 
           
            }else{
           echo '<center><h2>No hay productos añadidos en el carrito</h2> </center>';
            }
          ?>
            
        </ul>
            
           <h1 id="letra1">Monto Total: <?php 
               if (isset($_SESSION['total'])){
                   echo number_format( $_SESSION['total'], 2,',','.' );
               }else{
                   echo '0';
               }
               
              ?> bs</h1>
            </div>
            
            <?php
            
            $id_mp=md5($CS);
            $cliente_mp=$_POST['nombre-cliente'];
            
            if (isset($total) and isset($_POST['nombre-cliente']) and isset($_POST['email-cliente'])){
            $preference_data = array(
                "items" => array(
                    array(
                        "title" => "Carrito de compras en Rouxa - $cliente_mp",
                        "quantity" => 1,
                        "currency_id" => "VEF", // Available currencies at: https://api.mercadopago.com/currencies
                        "unit_price" =>  $total
                    )
                ),
                "payer" => array(
                    "name"=>$_POST['nombre-cliente'],
                    "email"=>$_POST['email-cliente'],
                                    ),
                "back_urls"=> array(
                    "success"=> "http://localhost/rouxaweb/back_MP.php?back=1&id=$id_mp",
                    "pending"=> "http://localhost/rouxaweb/back_MP.php?back=2&id=$id_mp",
                    "failure"=>"http://localhost/rouxaweb/back_MP.php?back=3&id=$id_mp"
                ),
                 "notification_url"=> "http://localhost/rouxaweb/receptor/",
                "external_reference"=>"$id_mp"
                
            );

            $preference = $mp->create_preference($preference_data);
            
            }    
            ?>
                
             
            <div class="container">
              <center>
                  <a href="<?php echo $preference['response']['init_point']; ?>" id="boton-mercadopago">Pagar por Mercado Pago</a>
              </center>
              
            </div>
          
            
            <!--Comentario en HTML 

            
            <div class="container">
                 
            <p class="texto-msn">Banco Mercantil <br>
             Titular: Rouxa.CA <br>
             RIF: j-xxxxxxxxx-x <br>
             N° cuenta: 010592827265287282xxxx <br>
             Correo: RouxaVzla@gmail.com <br> 
            </p>
            </div>
            
            <datalist id="bancos-emisores"> 
                <option value="BANCO MERCANTIL"></option>
                <option value="BANESCO"></option>
            </datalist>
            <datalist id="bancos-receptores"> 
                <option value="BANESCO"></option>
                <option value="BANCO MERCANTIL"></option>
                <option value="BANCO PROVINCIAL"></option>
                <option value="BANCO DE VENEZUELA"></option>
                <option value="BANCO BICENTENARIO"></option>
                <option value="BOD"></option>
                <option value="BANCARIBE"></option>
                <option value="BNC"></option>
                <option value="BANCO EXTERIOR"></option>
                <option value="100% BANCO"></option>
               
            </datalist>
            
             <form action="Imprimir.php" method="POST"  onsubmit="return validacion()">
             
             <div class="container">
            
            <div class="datos-personales">
                
            <input type="text" placeholder="Titular de la cuenta" name="titular" id="titular" >
            
            <input type="text" placeholder="Documento de identidad [ejemplo: V-20184865, J-34567645-3]" name="doc-identidad" id="doc-identidad" maxlength="15">
            
            <input type="text" placeholder="Correo" name="correo" id="correo" maxlength="50" >
            
            <input type="search" list="bancos-emisores" placeholder="Banco Emisor" name="bancoE" id="bancoE" maxlength="150">
            <input type="search" list="bancos-receptores" placeholder="Banco Receptor" name = "bancoR" id = "bancoR" maxlength="150">
            <input type="text" placeholder="Referencia bancaria" name = "ref" id = "ref" maxlength="150">
            </div>
                 <ul  class="ok-cancel">
                    <li></li>
                    <li><a href="Page_Compra.php" id="boton6">Atras</a></li>
                   <li>

                    <input type="submit" id="boton6" value="Imprimir">  
                   </li>
                   <li>
                       <a href="index.php" id="boton6">Cancelar</a>
                   </li>
                   
                   <li></li>
               </ul>
             </div>
              </form>
            -->  
          
             <div class="container">
             <ul class="redes-sociales">
                 <li> <a href="https://www.instagram.com/rouxavzla/" class="icon-instagram"></a>
           </li>    
            <li> <a href="https://www.facebook.com/RouxaVzla/" class="icon-facebook-squared"></a>
           </li>
             </ul>
         </div>
        </div>
        <?php 
        include ('pie.php');
        ?>
    </body>
</html>