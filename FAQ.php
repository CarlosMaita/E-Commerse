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
   <div style="min-height:100vh">
       
   
    <?php
        if($_GET){
             switch($_GET['id']){
                 case 1:
                     ?>
         <div class="container">
            <h1 id="letra1"  class="text-primary text-center">
      Productos
             </h1>
                 <hr class="my-4"> 
        </div>   
        
       <div class="container">
            <h1 id="letra1" class="text-muted" >
     Sin información.
             </h1>
        </div>
                     <?php
                     break;
                 case 2:
                       ?>
     <div class="container">
            <h1 id="letra1" class="text-primary  text-center">
      Envios y entregas
             </h1>
              <hr class="my-4"> 
        </div> 
       
     <div class="container">
            <h1 id="letra1" >
       ¿Cuanto tiempo tardan en hacer los envíos?
             </h1>
            <p class="text3">
                R: Los envios los realizamos de 24 a 48 Horas a partir de que se confirme en nuestras cuentas el pago del pedido.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
        ¿Cual seria el costo del envío de mi pedido?
             </h1>
            <p class="text3">
                R: Los costos de los envíos son valores que son generados por las empresas de encomienda, por lo cual no podemos proporcionarlos nosotros. Los costos dependen del lugar de destino, el peso, y si el paquete será asegurado o no.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
         ¿Cuanto tardara mi pedido en llegar?
             </h1>
            <p class="text3">
                R: Todo dependerá de la empresa de encomiendas, del lugar de destino, y de la fecha en la cual se realiza el envío (feriados, fin de semana). En promedio tarda de 4 a 7 días en llegar.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
         ¿Cómo realizan los envíos?
             </h1>
            <p class="text3">
                R: Todos los envíos son realizados con cobro en destino, si desea otro medio de envio, consulte con nosotros.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
         ¿A que hora realizan los envíos?
             </h1>
            <p class="text3">
                R: Todos los envios lo realizamos de Lunes a Viernes a las 3:00PM. Sin Excepción.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
         ¿Podrian enviar mi pedido pago?
             </h1>
            <p class="text3">
                R: Si, los pedidos los podemos enviar pagos desde la oficina de encomiendas. Sin embargo el cliente deberá cancelar el monto del envio antes de nosotros realizarlo.
            </p>
        </div>
        <div class="container">
            <h1 id="letra1">
        ¿Cuando me entregan mi codigo de seguimiento?
             </h1>
            <p class="text3">
                R: El código de seguimiento lo entregamos de 24 a 48 Horas a partir de realizar el envío.
            </p>
        </div>
                    
        <div class="container">
            <h1 id="letra1">
         ¿Cómo puedo comprobar el estado de mi pedido y de la entrega?
             </h1>
            <p class="text3">
                R: El estado de tu pedido lo puedes conocer con tu código de seguimiento, colocándolo en la opción de "Rastreo" de la empresa de encomiendas.
            </p>
        </div>    
        <div class="container">
            <h1 id="letra1">
         ¿Pueden hacer envíos a otro País?
             </h1>
            <p class="text3">
                R: Si, podemos hacer envíos a cualquier país. Los envios internacionales se realizan por DHL.
            </p>
        </div> 
                     <?php
                      break;
                 case 3:
                       ?>
          <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
           Devoluciones y Reembolsos
         </h1>
         </div>
             <hr class="my-4"> 
         <div class="container">
            <h1 id="letra1">
          ¿Puedo devolver un producto que no me haya gustado?
             </h1>
            <p class="text3">
                R: Sólo podrás devolver los productos que te hayan llegado con defectos de fabrica.
            </p>
        </div>
         <div class="container">
            <h1 id="letra1">
         ¿Cuanto tiempo tengo para realizar una devolución?
             </h1>
            <p class="text3">
                R: Tienes 15 días para realizar la devolución de tu pedido. Contados a partir del momento en que retiras el pedido en la oficina de la empresa de encomiendas.
            </p>
        </div>
          <div class="container">
            <h1 id="letra1">
         ¿Puedo devolver la mercancía y pedir a cambio mi dinero de vuelta?
             </h1>
            <p class="text3">
                R: No, los reembolsos solo lo hacemos si la mercancía cuenta con defectos de fabrica.
            </p>
        </div>
      <div class="container">
            <h1 id="letra1">
         ¿Me abonarán los gastos de envío si realizo la devolución de un producto?
             </h1>
            <p class="text3">
                R: No, los gastos del envio son montos pagados a la empresa de encomiendas, por lo cual nosotros no podemos devolver ese costo.
            </p>
        </div>
     <div class="container">
            <h1 id="letra1">
         ¿Se puede cambiar un producto por otro?
             </h1>
            <p class="text3">
                R: Si, pero deberás cancelar la diferencia. Ademas que deberás pagar el costo del nuevo envío.
            </p>
        </div>
         <div class="container">
            <h1 id="letra1">
         ¿Cuándo recibiré el reembolso?
             </h1>
            <p class="text3">
                R: Recibirás el rembolso en un plazo de 14 días naturales a partir de que: <br>
                Hayamos recibido el pedido devuelto en nuestros almacenes; o
nos comuniques tu decisión de revocar el contrato de compra. En ese plazo de 14 días (a) deberás enviarnos una prueba de que has devuelto tu pedido o (b) recibiremos tu pedido online en nuestro almacén. <br>
          Una vez hayas entregado el paquete al servicio de mensajería, tardará entre 3 - 5 días laborables en llegar a nuestro almacén. Cuando recibamos los productos devueltos, nos colocaremos en contacto contigo.
           
            </p>
        </div>
               <div class="container">
            <h1 id="letra1">
       ¿Que debe hacer si el paquete fue robado o extraviado por la agencia de encomiendas?
             </h1>
            <p class="text3">
                R: Deberás ponerte en contacto con ellos, y presentarles tu situación para que puedan solucionar tu problemas. Rouxa, C.A. no se hace responsable por los problemas ocasionados por la empresa de encomienda.
            </p>
        </div>
                
                     <?php
                     break;
                 case 4:
                       ?>
      <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
          Metodos de pago
             </h1>
        </div>
            <hr class="my-4"> 
     <div class="container">
            <h1 id="letra1">
     ¿Qué métodos de pago aceptan?
             </h1>
            <p class="text3">
                R: Aceptamos los metodos ofrecidos por Mercado pago. Todos los pagos son procesados por dicha plataforma de cobranza.
            </p>
        </div>
          <div class="container">
            <h1 id="letra1">
     ¿Como puedo realizar el pago de mi pedido?
             </h1>
            <p class="text3">
                R: El pago lo puede realizar al momento de realizar su pedido, a traves de la plataforma de Mercado Pago.
            </p>
        </div>
          <div class="container">
            <h1 id="letra1">
     ¿Puedo pagar mi pedido con dinero en efectivo o cheque?
             </h1>
            <p class="text3">
                R: No aceptamos cheques, giros bancarios o dinero en efectivo como pago por tu pedido. Los métodos de pago aceptados se indican arriba.
            </p>
        </div>
          <div class="container">
            <h1 id="letra1">
             ¿Puedo usar varios métodos de pago para mi pedido?
             </h1>
            <p class="text3">
                R: No puedes pagar por tu pedido con varios métodos de pago.
            </p>
        </div>
                     <?php
                      break;
                     
                 case 5:
                       ?>
        <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
          Suscripciones
             </h1>
        </div>
            <hr class="my-4"> 
       <div class="container">
            <h1 id="letra1">
            Sin información.
             </h1>
        </div>
                     <?php
                     break;
                 case 6:
                       ?>
     <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
          Vendedores
             </h1>
        </div>
            <hr class="my-4"> 
       <div class="container">
            <h1 id="letra1">
           Aún sin preguntas
             </h1>
        </div>
                     <?php
                      break;
                 case 7:
                       ?>
      <div class="container" >
            <h1 id="letra1"  class="text-primary  text-center">
          Promociones
             </h1>
        </div>
            <hr class="my-4"> 
       <div class="container">
            <h1 id="letra1">
            Sin información.
             </h1>
        </div>
                     <?php
                     break;
                 case 8:
                       ?>
        
        <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
           Retiros en tienda
         </h1>
         </div>
        <hr class="my-4"> 
     <div class="container">
            <h1 id="letra1">
           ¿Donde puedo retirar mi pedido?
             </h1>
            <p class="text3">
                R: Los pedidos los puedes retirar en la oficina de la empresa de encomiendas a la cual se te haya sido enviado el pedido.
            </p>
        </div>
         <div class="container">
            <h1 id="letra1">
          ¿Ustedes tienen tienda fisica?
             </h1>
            <p class="text3">
                R: No, nosotros somos tienda virtual.
            </p>
        </div>
                     <?php
                      break;
                 case 9:
                       ?>
         <div class="container">
            <h1 id="letra1"  class="text-primary  text-center">
           Informacion de Rouxa
             </h1>
        </div>
            <hr class="my-4"> 
       <div class="container">
         <h1 id="letra1">
          ¿Quien es Rouxa?
             </h1>
            <p class="text3">
                R: Rouxa es una nueva empresa Venezolana, creyente de la nueva era digital de venta por internet, fabricante de ropa de alta calidad y confort, cumpliendo con los estándares de moda exigidos por nuestros clientes nacionales e internacionales.
            </p>
        </div>
        <div class="container">
         <h1 id="letra1">
          ¿Cuales son los intereses sociales de Rouxa?
             </h1>
            <p class="text3">
                R: Rouxa, cree en la familia como pilar fundamental de la sociendad. Por lo que, el fortalecimiento de valores familiares en la sociendad Venezolana es quizas el principal interes social de la empresa.  
            </p>
        </div>           
                    
                    
                     <?php
                      break;
                 default:
                       ?>
     <div class="container">
            <h1 id="letra1"  class="text-primary">
          Aún no existe esta FAQ.
             </h1>
        </div>
                     <?php
                     break;
             }    
   
            
        }else{
              ?>
       <div class="container">
     <h1 id="letra1" class="text-center text-muted">Preguntas Frecuentas(FAQ)</h1>
       <hr class="my-4"> 
     </div>
     
      
         <ul class="faq-column">
             <li id="faq-li" class="bg-dark" >
                 <ul class="faq-row ">
                      <li><a href="FAQ.php?id=9" class="bg-dark text-white">Informacion de Rouxa</a></li>
                     <li><a href="FAQ.php?id=2" class="bg-dark text-white">Envios</a></li>
                      <li><a href="FAQ.php?id=3" class="bg-dark text-white">Devoluciones y Reembolsos</a></li>
                    <li><a href="FAQ.php?id=4" class="bg-dark text-white">Metodos de pago</a></li>
                    <li><a href="FAQ.php?id=8" class="bg-dark text-white">Retiros en tienda</a></li>
                   
                </ul>
             </li>
             <li id="faq-li" class="bg-dark">
                <ul class="faq-row bg-dark">
                     <li><a href="FAQ.php?id=1" class="bg-dark text-white">Productos</a></li>
                     <li><a href="FAQ.php?id=5" class="bg-dark text-white">Suscripciones</a></li>
                      <li><a href="FAQ.php?id=6" class="bg-dark text-white">Vendedores</a ></li>
                    
                      <li><a href="FAQ.php?id=7" class="bg-dark text-white">Promociones</a></li>
                 </ul>
             </li>
         </ul>
        
         <?php
            
        }
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