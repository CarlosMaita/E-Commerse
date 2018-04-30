   <?php
    include_once 'Common/conexion.php';

session_start();
    
    
    $pago_ok='Pago Exitoso';
    $pago_pen='Pago Pendiente';
    $pago_falla='Pago Fallido';

    $msn_ok='Nos complace que te hayas decidido a comprar en ROUXA.  <br><br>El pago ya ha sido procesado como exitoso. Por lo que tu compra es todo un hecho, en las proximas  cuarenta y ocho (48) horas estaremos enviando tu pedido. <br><br>Recuerda que puedes hacerle seguimiento a tu compra a través del IDCOMPRA. Sin más que agregar, Muchas Gracias por tu Compra, Te queremos.';

    $msn_pen='Nos complace que te hayas decidido a comprar en ROUXA. <br><br>El pago ha quedado como pendiente, una vez la plataforma  mercado pago realice la aprobación del dinero, tu pedido será enviado dentro de las proximas cuarenta y ocho (48) horas.<br><br>Recuerde que puedes hacerle seguimiento a tu compra a través del IDCOMPRA. Sin mas que agregar, Muchas Gracias por tu Compra, Te queremos.';

    $msn_falla='El pago ha sido cancelado, esperamos que pronto este de vuelta. Gracias por visitarnos.';

   ?> 
   
   <html>
    <head>
            <link rel="stylesheet" href="css/Stile.css">
              <link rel="stylesheet" href="css/fontello.css">
             
    </head>
     <script>
        function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
            }   
    </script>
    <body  onload="deshabilitaRetroceso()">
       <?php 
        include ('menu.php');
        ?>
       <div class="container">
          
           <?php  
          
        if (isset($_GET['back']) and isset($_GET['id'])){
            $back=$_GET['back'];
            $id=md5($_GET['id']);
            
            switch($back){
                //success    
                case '1':
                    ?>
                     <h1 id="back-pago" style="color: #0d0;"><?php echo $pago_ok;?></h1>
                      <p id="back-msn"><?php echo $msn_ok;?></p>
                    <?php
                    
                 
                    
                    
                     session_destroy();
                    break;
                case '2': 
                     ?>
                     <h1 id="back-pago" style="color:#00d"><?php echo $pago_pen;?></h1>
                      <p id="back-msn"><?php echo $msn_pen;?></p>
                    <?php
                  
                    
                     session_destroy();
                    break;
                case '3':
                     ?>
                     <h1 id="back-pago" style="color:#d00"><?php echo $pago_falla;?></h1>
                      <p id="back-msn"><?php echo $msn_falla;?></p>
                    <?php
                    
                      $sql0="
                        DELETE FROM ENVIOS WHERE IDPEDIDO='$id'";
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                        $sql0="
                        DELETE FROM ITEMS WHERE IDPEDIDO='$id'";
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
                        $sql0="UPDATE `PEDIDOS` SET `ESTATUS`='1' WHERE  `IDPEDIDO`='$id'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
                    break;
                    
            }}
               ?>
       
       </div>
        
                          
    </body>
</html>