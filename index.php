<?php
    session_start();
include 'Common/conexion.php';

   
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

    <section class="container-fluid principal d-flex flex-column align-items-end justify-content-end pr-4 pb-5">
      <h1 class="display-2 text-muted">Rouxa</h1>
      <p class="font-italic text-white">Comodidad, Confort, Estilo, Vanguardia.</p>
    </section>

    <div class="jumbotron mb-0">
      <h1 class="display-4">Seguimiento de una compra</h1>
      <p class="lead">Cada compra realizada en Rouxa posee un ID único, y solo se genera al momento de comprar. ¡Procure no extraviarlo! </p>
      <hr class="my-4">
      <p>La forma de usar el IDCOMPRA es mediante el seguidor de pedido que se encuetra en el menu principal en "Compras". Alli, podra visualizar el estatus de un pedido, el número de guia (una vez que se envia el paquete) e información de la compra.</p>
     
    </div>
   
   <section class="principal2 container-fluid d-flex flex-column align-items-end justify-content-end pr-4 pb-3">
     <h1 class="display-4 text-light">La familia es lo más importante</h1>
     <p class="font-italic text-muted h5">Creemos firmemente que tu familia es lo más importante para ti.</p>
   </section>

   <div class="jumbotron bg-dark mb-0">
     <h1 class="display-5 text-muted">¡Disfruta de Nuestras Promociones!</h1>
     <hr class="my-4">
     <p class="lead text-white-50">Envios gratis, precios al Mayor, Promociones Especiales y ¡Mucho más!</p>
     <a class="btn btn-secondary disabled btn-lg mt-3" href="FAQ.php?id=7" role="button">Promociones</a>
   </div>
   
   

   <article class="container my-5">
     
     <div class="card-deck">
       <?php 
                     
     $sql = "SELECT * FROM PRODUCTO ORDER BY Rand() LIMIT 3";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     // output data of each row
        while($row = $result->fetch_assoc()) {
            
           ?>
       <div class="card" style="max-width: 100%; height: auto;">
         <a href="Page_detalle.php?id=<?php echo $row['IDPRODUCTO']; ?>"><img class="card-img-top img-fluid" src="imagen/<?php echo $row['IMAGEN']; ?>" alt="<?php echo $row['NOMBRE_P']; ?>"></a>
         <div class="card-body">
           <h5 class="card-title"><?php echo $row['NOMBRE_P']; ?></h5>
           <p class="card-text">Excelente para un paseo por la ciudad, el parque o el centro comercial. 100% Algodón.</p>
           <p class="card-text"><small class="text-muted">Precio: <?php echo number_format($row['PRECIO'], 2, ',', '.'); ?>  Bs</small></p>
         </div>
       </div>
        <?php
            }
        } else {

            echo " <p>Aun no existen productos en Vitrina</p>";
        }?>
     </div>
   </article>
   
  
    <div class="jumbotron mb-0">
      <h1 class="display-4">¡Se un Vendedor Rouxa!</h1>
      <p class="lead">Podrás vender nuestros productos sin tener que realizar alguna inversión.</p>
      <hr class="my-4">
      <p>Solo tendrás que dar tu código de Vendedor Rouxa a tu cliente, y este comprará a tu nombre los articúlos que desee.</p>
      <a class="btn btn-secondary btn-lg disabled mt-3" href="" role="button">Proximamente</a>
    </div>


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









