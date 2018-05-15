<?php

include 'Common/conexion.php';

$publicidad="¡Compra Los mejores productos!";

if(isset($_GET['genero'])){
    $genero=$_GET['genero'];
    switch($genero){
        case '1':
              $publicidad="¡Compra los mejores productos para Damas!";
            break;
        case '2': 
              $publicidad="¡Compra los mejores productos para Caballeros!";
            break;
            
    }
    
}else{$genero=3;}

if(isset($_GET['tipo'])){
    $tipo=$_GET['tipo'];
    switch($tipo){
        case 'franela':
             $publicidad="¡Compra las mejores Franelas!";
            break;
        case 'chemise':
             $publicidad="¡Compra las mejores Chemises!";
            break;
        case 'pantalon':
             $publicidad="¡Compra Los mejores Pantalones!";
            break;
        case 'zapatos':
             $publicidad="¡Compra Los mejores Zapatos!";
            break;
    }
    
}else{
    $tipo='null';
}


?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa." />
  <link rel="stylesheet" href="css/style-main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Font -Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">

    <title>Rouxa</title>
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
            
            <?php
            
                  switch($genero){
                      case '1':
                         
                          ?> 
                          <li class="nav-item active ">
              <a class="nav-link" href="vitrina.php?genero=1">Damas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vitrina.php?genero=2">Caballeros</a>
                          <?php
                          break;
                    
                      case '2':
                         
                           ?> 
                          <li class="nav-item ">
              <a class="nav-link" href="vitrina.php?genero=1">Damas</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="vitrina.php?genero=2">Caballeros</a>
                          <?php
                          break;
                      default: 
                             ?>          
                              <li class="nav-item ">
              <a class="nav-link" href="vitrina.php?genero=1">Damas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vitrina.php?genero=2">Caballeros</a> 
                               <?php
                          break;  
                  }
                  
             
                   ?> 
                                     
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
    
    <nav class="navbar-2 navbar-expand-lg navbar-primary bg-ligth d-none d-lg-block justify-content-center">
      <div class="container">
        <div class="collapse navbar-collapse justify-content-center">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="vitrina.php?tipo=franela">Franelas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="vitrina.php?tipo=chemise">Chemises</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="vitrina.php?tipo=pantalon">Pantalones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="vitrina.php?tipo=zapatos">Zapatos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron mb-0">
      <h1 class="display-4"><?php echo $publicidad;?></h1>
      <p class="lead">Dentro de la vitrina de Rouxa podras encontrar franelas, chemises, pantalones, zapatos y accesorios para damas y caballeros.</p>
      <hr class="my-4">
    </div>

 
    
       <?php 
    
     $offset=0;
     $void=false;
     $numProd=3;
     $rand=rand();
      
      while(!$void){
          
       $sql = "SELECT * FROM PRODUCTO  ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
               
        if (isset($_GET['genero'])){
            if (!empty($genero)){
                $sql_genero='WHERE GENERO='.$genero;
                $sql = "SELECT * FROM PRODUCTO $sql_genero ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
            }
        } 
        if( isset($_GET['tipo'])){

            if (!empty($tipo)){
            $sql_tipo="WHERE TIPO='$tipo'"; 
            $sql = "SELECT * FROM PRODUCTO $sql_tipo  ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";    
            }

        }

          
     $result = $conn->query($sql);
     $cant=$result->num_rows;          
     if ($cant > 0) {
        
         ?> 
    <article class="container my-5">
      <div class="card-deck" >
               <?php
         
     // output data of each row
        while($row = $result->fetch_assoc()) {
            
           ?>
       <div class="card" >
         <a href="Page_detalle.php?id=<?php echo $row['IDPRODUCTO']; ?>"><img class="card-img-top img-fluid" src="imagen/<?php echo $row['IMAGEN']; ?>" alt="<?php echo $row['NOMBRE_P']; ?>"></a>
         <div class="card-body">
           <h5 class="card-title"><?php echo $row['NOMBRE_P']; ?></h5>
           <p class="card-text"><small class="text-muted">Precio: <?php echo number_format($row['PRECIO'], 2, ',', '.'); ?>  Bs</small></p>
         </div>
       </div>
        <?php
            }
          for ($i=0; $i<$numProd-$cant;$i++){
              echo '<div class="card" style="border:none"></div>';
         }
         ?>
             </div>
       </article>
         <?php
         $offset=$offset+$numProd;
        } 
        else {
            $void=true;
        }
      }
      ?>
     
   

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
