<?php
    include_once '../Common/conexion.php';

    if(isset($_GET['id']) and isset($_GET['guia']) and $_GET['guia']!=NULL){
        $newid=$_GET['id'] ;
        $guia=$_GET['guia'];
        
        $sql="UPDATE `ENVIOS` SET `GUIA`='$guia' WHERE `IDPEDIDO`='$newid'";
        
        
        if ($conn->query($sql) === TRUE) {

                        $sql2="UPDATE `PEDIDOS` SET `ESTATUS`='6' WHERE  `IDPEDIDO`='$newid'";
                    
                        if ($conn->query($sql2) === TRUE) {

                        } else {
                        echo "Error: " . $sql2. "<br>" . $conn->error;
                        }
            
        } else {
        echo "Error: " . $sql. "<br>" . $conn->error;
        }
        
         header ('location:Envios.php');
    }

?>
   <html>
    <head>
           <link rel="stylesheet" href="../css/Stile.css">
    </head>
     <script>
        function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
            }   
        
        
         
         function confirma(){
             r=confirm("¿Esta usted seguro?");
             return r;
         }
        
    </script>
    <body onload="deshabilitaRetroceso()">
        <div class="container">
           <h1 id="titulo">Envios - Rouxa</h1>
           
            <?php
            $sql="SELECT `IDPEDIDO` FROM `PEDIDOS` WHERE `ESTATUS`='5'";
                
            $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                       $id=$row['IDPEDIDO'];
                     ?>
                   
           
           
           <div class="Envios">
              <p id="idpedido">Pedido: <?php echo $id;?>
             </p>
            <form action="Envios.php" method="get">
                 <input type="text" value="<?php echo $id;?>" name="id" style="display: none">
                 <input  type="text" placeholder="Numero de Guia" id="guia" name="guia">  
               <center>
                   <input type="submit" id="Enviado" value="Pedido Enviado" onclick="return confirma()"> 
               </center>   
            </form>
             </div>            
                <?php
                  }
            
            
              }else{
                  
                   ?>
                         <p id="titulo" style="color:red">Sin pedidos por enviar</p>
                      <?php
              }
                
            $conn->close()
        
            ?>                                       
        </div>
    </body>
</html>