<?php

include 'Common/conexion.php';

$ESTATUS_FALLIDO='1';
    
$atras = '<p><a href="index.php">Pagina principal</a></p>' ;   
?>
  
 
   <html>
    <head></head>
    <body>
        <?php
        if (isset($_GET['back'] and isset($_GET['id']))){
            $back=$_GET['back'];
            switch($back){
                //success    
                case '1':
                      ?>
                      <p>Trasaccion Exitosa</p>
                      
                      <?php
                    
                    echo 'Id: '.$_GET['id'];
                    
                    $id=md5($_GET['id']);
                    
                    $sql0="UPDATE `pedidos` SET `ESTATUS`='3' WHERE  `IDPEDIDO`='$id'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
                    break;
                    //pending    
                case '2':
                      ?>
                        <p>
                            Transaccion Pendiente
                        </p>
                      <?php
                      echo 'Id: '.$_GET['id'];
                    
                    $id=md5($_GET['id']);
                     
                    $sql0="UPDATE `pedidos` SET `ESTATUS`='2' WHERE  `IDPEDIDO`='$id'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
                    
                    break;
                    //failure    
                case '3':
                      ?>
                      Transaccion Cancelada o Fallida
                      <?php
                        echo 'Id: '.$_GET['id'];
                        
                        $id=md5($_GET['id']);
                       
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
                    
                        $sql0="UPDATE `pedidos` SET `ESTATUS`='1' WHERE  `IDPEDIDO`='$id'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
                    break;
                    }
            
              echo $atras; 
        }
        ?>

    </body>
</html>