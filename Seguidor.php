<?php

 require_once 'Common/conexion.php';

  ?>
   <html>
    <head>
         <link rel="stylesheet" href="css/Stile.css">
    </head>
    <body>
        <?php include_once 'menu.php'?>
        
         <div class="container">
            <div class="seguimiento">
            
            <h1 id="titulo">Seguimiento de Compra</h1>
            
            <form action="" method="get" >
            <div id="seguidor">
                <input type="text" placeholder="Inserte su IDCOMPRA" name="idcompra" id="campo" maxlength="32" >

                <input type="submit" id="buscar" value="Buscar">    

            </div>
                
            </form>
           </div>
           <?php
    if (isset($_GET['idcompra']) ) {
        if($_GET['idcompra']!=NULL){
            
            $id= $_GET['idcompra'];
            $id=md5($id);
        $sql= "SELECT p.CLIENTE,p.FECHAPEDIDO,p.ESTATUS,c.MONTO FROM PEDIDOS p 
        INNER JOIN COMPRAS c
        ON c.idpedido=p.idpedido
        WHERE p.idpedido='$id'";
            
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $cliente=$row['CLIENTE'];
            $fecha_pedido=$row['FECHAPEDIDO'];
            switch($row['ESTATUS']){
                case '0': $status= 'Por pagar';
                    break;
                case '1': $status='Pago Fallido';
                    break;
                case '2': $status='Pago pendiente';    
                    break;
                case '3': $status='Pagado | Buscando en stock'; 
                    break;
                case '4': $status='Por empaquetar' ;
                    break;
                case '5': $status='Por enviar';
                    break;
                case '6': $status='Enviado';
                    break;
                case '7': $status='Completado';
                    break;
                case '10': $status='Bajo Revisión';
                
            }
            $monto= $row['MONTO'];
          

           ?>
            <div class="seguimiento">
                  <h1 id="titulo">Datos de Compra</h1>
            <p id ="datos" >Cliente: <?php echo $cliente;?> 
            <br>Fecha de pedido: <?php echo $fecha_pedido;?> 
            <br>Estatus: <?php echo $status;?> 
            <br>Monto Total: <?php echo number_format($monto,2,',','.');?> Bs 
            </p>
            
            
          
            <?php
             $sql2="SELECT `PRECIO`,`CANTIDAD`, `IDINVENTARIO`  FROM `items` WHERE `IDPEDIDO`='$id';";
            
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0) {
                 ?>
                   <p id="datos">Items <br>
                 <?php
             }
            
             if ($result2->num_rows > 0) {
                $i=1;     
                  while($row = $result2->fetch_assoc()) {
                    $id_inv=$row['IDINVENTARIO'];
                     $sql3="SELECT p.nombre_p FROM `inventario` i INNER JOIN `producto` p ON i.idproducto=p.idproducto WHERE i.idinventario='$id_inv' LIMIT 1";
                      
                    $result3 = $conn->query($sql3);
                       if ($result3->num_rows > 0) {
                              while($row3 = $result3->fetch_assoc()) {
                                  $nombre_p=$row3['nombre_p'];
                              }
                            
                       }
                    
                      
                      ?>
                      Item N° <?php echo $i ?> <br>
                       <?php echo $nombre_p; ?> <br>
                        Precio: <?php  echo number_format($row['PRECIO'],2,',',"."); ?> Bs <br>
                        Cantidad:  <?php   echo $row['CANTIDAD']; ?> Unidad(es) <br>
                        <br>
                  
                      <?php   
                      $i++; 
                }
             }
            
            
             $sql2="SELECT `RAZONSOCIAL`,`RIFCI`, `DIRFISCAL`  FROM `compras` WHERE `IDPEDIDO`='$id' LIMIT 1;";
            
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                
                $razon = $row['RAZONSOCIAL'];  
                $identidad=$row['RIFCI'];  
                $dir_fiscal=$row['DIRFISCAL'];
                
                 if($razon=='NULL' or $identidad=='NULL' or $dir_fiscal=='NULL' ){}else{
                 
                  ?>         
            
            <h1 id="titulo">Datos de Facturación</h1>
            <p id="datos">
            Razón Social:    <?php echo $razon;?>    
            <br>RIF:  <?php echo   $identidad;   ?>
            <br>Direccion Fiscal:  <?php echo  $dir_fiscal; ?> 
            </p>
            
            
            <?php
                 
                 }
             }
         
            
                $sql= "SELECT * FROM ENVIOS e WHERE e.idpedido='$id' LIMIT 1";
                
                  $result3 = $conn->query($sql);
                 if ($result3->num_rows > 0) {
                 $row3 = $result3->fetch_assoc();     
                 
                ?>
           
            
             <h1 id="titulo">Datos de Envio</h1>
            <p id="datos">
                
                <br>Receptor:     <?php echo $row3['RECEPTOR'] ;?>
                <br>CI o RIF:      <?php echo $row3['CIRECEPTOR'] ;?>
                <br>Telefono:      <?php echo $row3['TELFRECEPTOR'] ;?>
                <br>Direccion :  <?php echo $row3['PAIS'] ;?>,      <?php echo $row3['ESTADO'] ;?>,      <?php echo $row3['CIUDAD'] ;?>,      <?php echo $row3['MUNICIPIO'] ;?>      <?php echo $row3['PARROQUIA'] ;?> <?php echo $row3['DIRECCION'] ;?>
                <br>Codigo postal:      <?php echo $row3['CODIGOPOSTAL'] ;?>
                <br>Observaciones:      <?php echo $row3['OBSERVACIONES'] ;?>
                <br>N° de guia: <?php
                    if($row3['GUIA']!=NULL){
                        echo $row3['GUIA'];
                    }else{
                        echo '-';
                        
                    }
                     
                ?>     
                    
                      
            </p>
            
            
            </div>
            <?php
              }
                }else{
            ?>
               <div class="seguimiento">
                  <h1 id="titulo" style="color:red">Su ID de compra no exite. Por favor, verifique.</h1> 
                </div>     
            <?php
        }
        
        
        }
    }
             $conn->close()
        
        
             ?>

      </div>
    </body>
</html>