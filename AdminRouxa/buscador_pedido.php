<?php
    include_once '../Common/conexion.php';

    if(isset($_GET['orden']) and isset($_GET['id']) ){
        $newid=$_GET['id'];
        
        if ($_GET['orden']=='good'){
            
        $sql="UPDATE `PEDIDOS` SET `ESTATUS`='4' WHERE  `IDPEDIDO`='$newid'";
                    
                        if ($conn->query($sql) === TRUE) {

                        } else {
                        echo "Error: " . $sql. "<br>" . $conn->error;
                        }
                    
            
        }
        else if ($_GET['orden']=='bad'){
            if (isset($_GET['comentario'])){
                $comentario=$_GET['comentario'];
            }
            
           $sql="UPDATE `PEDIDOS` SET `ESTATUS`='10' WHERE  `IDPEDIDO`='$newid'";
                    
            if ($conn->query($sql) === TRUE) {

            } else {
            echo "Error: " . $sql. "<br>" . $conn->error;
            }
            
            $sql="INSERT INTO `FALLA`(`IDPEDIDO`, `COMENTARIO`, `FECHAFALLA`) VALUES ('$newid','$comentario', CURRENT_DATE())";
             if ($conn->query($sql) === TRUE) {

            } else {
            echo "Error: " . $sql. "<br>" . $conn->error;
            }     
        } 
         header ('location:buscador_pedido.php');
    }

?>
   <html>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <head>
           <link rel="stylesheet" href="../css/Stile.css">
    </head>
    <script>
        function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
            }   
        
         var band=false;
       
         function ven(){
             if(!band){
                 band=!band;
                 document.getElementById('falla-comentario').style.display='block'; 
             }else{
                 band=!band;
                  document.getElementById('falla-comentario').style.display='none';  
                  document.getElementById('comentario').value='';
             }
             
            
         }
         
        
         
         function confirma(){
             r=confirm("¿Esta usted seguro?");
             return r;
         }
        
    </script>
    <body onload="deshabilitaRetroceso()">
        <div class="container">
           <h1 id="titulo">Busqueda de pedido - Rouxa</h1>
           
           <?php
            $sql="SELECT `IDPEDIDO` FROM `PEDIDOS` WHERE `ESTATUS`='3'";
                
            $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                       $id=$row['IDPEDIDO'];
                       ?>
                         
                          <div class="pedido">
            
              <p id="idpedido">Pedido: <?php echo $id;?>
               
             </p>
              <ul class="items">
                <li>
                    <ul  id="line-titulo">
                        <li>IdInventario</li>
                        <li>Producto</li>
                        <li>Talla</li>
                        <li>Cantidad</li>
                     </ul>
             <?php
                 
            $sql2="SELECT `IDINVENTARIO`, `CANTIDAD` FROM `ITEMS` WHERE `IDPEDIDO`='$id'";
                       
         
             $result2 = $conn->query($sql2);
                 if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
                        
                          $idinventario=$row2['IDINVENTARIO'];
                           $cantidad=$row2['CANTIDAD'];
                        
                          $sql3="SELECT p.NOMBRE_P, i.TALLA FROM `INVENTARIO` i INNER JOIN `PRODUCTO` p ON i.idproducto=p.idproducto WHERE i.idinventario='$idinventario' LIMIT 1";
                            $result3 = $conn->query($sql3);
                          if ($result3->num_rows > 0) {
                      while($row3 = $result3->fetch_assoc()) {
                        $nombre=$row3['NOMBRE_P'];
                         $talla=$row3['TALLA'];
                          
                      }}
                          
                          
                          ?>
                          
                        
                    <ul id="line-item">
                       <li><?php echo $idinventario;?></li>
                       <li><?php echo $nombre; ?></li>
                        <li><?php echo $talla;?></li>
                       <li><?php echo $cantidad;?></li>
                    </ul>
                          
                          <?php
                          
                          
                      }
                 }        
                 ?>
             
           
                </li>
                <li>
                    <ul id="line-botones">
                        <li>
                          <a href="buscador_pedido.php?orden=good&id=<?php echo $id;?>" id="good" onclick="return confirma()">LISTO</a> 
                        </li>
                        <li>
                            <a onclick="ven()" id="bad">FALLA</a>   
                        </li>
                    </ul>
                </li>
                <li>
                    <div id="falla-comentario" style="display:none">
                               <form action="buscador_pedido.php" method="get">
                                   <input type="text" value="bad" name="orden" style="display: none">
                                   <input type="text" value="<?php echo $id;?>" name="id" style="display: none">
                                   <input type="text" name="comentario" id="comentario" maxlength="200" placeholder="Detalle la falla con un comentario">
                                   <input type="submit" value="Enviar" id="boton-enviar" onclick="return confirma()">
                               </form>
                    </div>
                                                   
                    
                </li>
                </ul>        
           </div>
                       
                       <?php
                   }
                  
              }else{
                  
                   ?>
                         <p id="titulo" style="color:red">Sin pedidos por buscar del inventario</p>
                      <?php
              }
                    $conn->close()
        
            ?>
           
        
                   
                       
                                                       
        </div>
    </body>
</html>