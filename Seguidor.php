<?php

 require_once 'Common/conexion.php';

  ?>
  
 <!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa." />
     <link rel="stylesheet" href="css/style-main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Font -Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">

    <title>Rouxa-Carrrito de Compras</title>
  </head>
  <body>
     <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Rouxa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="vitrina.php?genero=1">Damas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vitrina.php?genero=2">Caballeros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Seguidor.php">Compras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Vendedores</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contactanos.php">Contacto</a>
            </li>
          </ul>
          <ul class="nav justify-content-end pr-3">
            <li class="nav-item"><a class="enlace" href="carrito.php"><i class="fa fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


   

<!--
 Inicio de codigo.
 !--> 
   
   <div class="jumbotron mb-0">
      <h1 class="display-4">¡Haz le seguimiento a tu compra!</h1>
      <p class="lead">Inserta tu ID de compra en el campo que se muestra abajo.</p>
      <hr class="my-4">
    
  <form action="" method="get" >                
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Inserte su IDCOMPRA" aria-label="Inserte su IDCOMPRA" aria-describedby="basic-addon2"  name="idcompra" maxlength="32">
          
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
          </div>
        </div>
 </form>
</div> 
 
<div  style="min-height:55vh">
    
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
 
 
           
           <div class="container my-4"> 
            <h1 id="titulo" class=" text-muted">Datos de Compra</h1>
            <p id ="datos"  >Cliente: <?php echo $cliente;?> 
            <br>Fecha de pedido: <?php echo $fecha_pedido;?> 
            <br>Estatus: <?php echo $status;?> 
            <br>Monto Total: <?php echo number_format($monto,2,',','.');?> Bs 
            </p>
            <hr class="my-4">
            
 <?php
             $sql2="SELECT `PRECIO`,`CANTIDAD`, `IDINVENTARIO`  FROM `items` WHERE `IDPEDIDO`='$id';";
            
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0) {
                 ?>
                   <h2 id="titulo" class="text-muted">Items</h2>
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
                      <p>Item N° <?php echo $i ?> <br>
                       <?php echo $nombre_p; ?> <br>
                        Precio: <?php  echo number_format($row['PRECIO'],2,',',"."); ?> Bs <br>
                        Cantidad:  <?php   echo $row['CANTIDAD']; ?> Unidad(es) <br>
                        <br>
                     </p>
                    <hr class="my-4">
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
         
            
            <h1 id="titulo" class="text-muted">Datos de Facturación</h1>
            <p id="datos">
            Razón Social:    <?php echo $razon;?>    
            <br>RIF:  <?php echo   $identidad;   ?>
            <br>Direccion Fiscal:  <?php echo  $dir_fiscal; ?> 
            </p>
            <hr class="my-4">
            
            <?php
                 
                 }
             }
         
            
             $sql= "SELECT * FROM ENVIOS e WHERE e.idpedido='$id' LIMIT 1";
                
             $result3 = $conn->query($sql);
            
             if ($result3->num_rows > 0) {
                 $row3 = $result3->fetch_assoc();     
                 
                ?>
           
            
             <h1 id="titulo" class="text-muted">Datos de Envio</h1>
                <p id="datos" >
                
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
              <hr class="my-4">
          
<?php
              }
         ?>    
     </div>
             <?php    
        }
    
        else{
            ?>
               <div class="container my-5">
                  <h1 id="titulo" style="color:red" class="text-center">El ID de compra ingresado No exite. Por favor, verifique.</h1> 
                </div>
                 <?php     
                
                }


                }
            }
    $conn->close();
?>
             
</div>     
<!--
Fin  de codigo.
 !-->  
   

   <!--
Pie de Pagina
 !-->     
<?php include_once 'Pie.php';?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>