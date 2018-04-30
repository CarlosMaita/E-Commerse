
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
           <link rel="stylesheet" href="css/Stile.css">
           <link rel="stylesheet" href="css/fontello.css">
    </head>
    <body>

        <?php 
        include('menu.php');
        ?>
      
       
        <?php
        if($_GET){
             switch($_GET['id']){
                 case 1:
                     ?>
         <div class="container">
            <h1 id="letra1">
      Productos
             </h1>
        </div>    
       <div class="container">
            <h1 id="letra1">
        Aún sin preguntas
             </h1>
        </div>
                     <?php
                     break;
                 case 2:
                       ?>
     <div class="container">
            <h1 id="letra1">
      Entregas y envios
             </h1>
        </div> 
     <div class="container">
            <h1 id="letra1">
       ¿Cuanto tiempo tardan en hacer los envíos?
             </h1>
            <p class="text3">
                R: Los envios los realizamos de 24 a 72 Horas a partir de que confirmemos en nuestras cuentas el pago del pedido.
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
                R: Si, podemos hacer envíos a cualquier país. Los envios lo realizamos por DHL.
            </p>
        </div> 
                     <?php
                      break;
                 case 3:
                       ?>
          <div class="container">
            <h1 id="letra1">
           Devoluciones y Reembolsos
         </h1>
         </div>
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
            <h1 id="letra1">
          Metodos de pago
             </h1>
        </div>
     <div class="container">
            <h1 id="letra1">
     ¿Qué métodos de pago aceptan?
             </h1>
            <p class="text3">
                R: Aceptamos transferencias a nuestras cuentas en los bancos Mercantil y Banesco. También aceptamos Pagos por PayPal.
            </p>
        </div>
          <div class="container">
            <h1 id="letra1">
     ¿Como puedo realizar el pago de mi pedido?
             </h1>
            <p class="text3">
                R: El pago lo puede realizar al momento de realizar su pedido.
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
            <h1 id="letra1">
           Cuentas y subcripciones
             </h1>
        </div>
       <div class="container">
            <h1 id="letra1">
           Aún sin preguntas
             </h1>
        </div>
                     <?php
                     break;
                 case 6:
                       ?>
     <div class="container">
            <h1 id="letra1">
          Vendedores
             </h1>
        </div>
       <div class="container">
            <h1 id="letra1">
           Aún sin preguntas
             </h1>
        </div>
                     <?php
                      break;
                 case 7:
                       ?>
      <div class="container">
            <h1 id="letra1">
          Promociones y codigos de descuento
             </h1>
        </div>
       <div class="container">
            <h1 id="letra1">
           Aún sin preguntas
             </h1>
        </div>
                     <?php
                     break;
                 case 8:
                       ?>
        
        <div class="container">
            <h1 id="letra1">
           Retiros en tienda
         </h1>
         </div>
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
            <h1 id="letra1">
           Informacion de la empresa
             </h1>
        </div>
       <div class="container">
            <h1 id="letra1">
           Sin preguntas
             </h1>
        </div>
                     <?php
                      break;
                 default:
                       ?>
     <div class="container">
            <h1 id="letra1">
          Aún no existe esta FAQ.
             </h1>
        </div>
                     <?php
                     break;
             }    
   
            
        }else{
              ?>
       <div class="container">
     <h1 id="letra1">Preguntas Frecuentas(FAQ)</h1>
     </div>
      <div class="container">
         <ul class="faq-column">
             <li id="faq-li">
                 <ul class='faq-row'>
                     <li><a href="FAQ.php?id=1">Productos</a></li>
                     <li><a href="FAQ.php?id=2">Entregas y envios</a></li>
                     <li><a href="FAQ.php?id=3">Devoluciones y Reembolsos</a></li>
                     <li><a href="FAQ.php?id=4">Metodos de pago</a></li>
                     <li><a href="FAQ.php?id=5">Cuentas y subcripciones</a></li>
                 </ul>
             </li>
             <li id="faq-li">
                 <ul class="faq-row">
                     <li><a href="FAQ.php?id=6">Vendedores</a></li>
                     <li><a href="FAQ.php?id=7">Promociones y codigos de descuento</a></li>
                     <li><a href="FAQ.php?id=8">Retiros en tienda</a></li>
                     <li><a href="FAQ.php?id=9">Informacion de la empresa</a></li>
                 </ul>
             </li>
         </ul>
      </div>
        
        
  
        
         <?php
            
        }
        ?>
        
         
        
         <div class="container">
             <ul class="redes-sociales">
                 <li> <a href="https://www.instagram.com/rouxavzla/" class="icon-instagram"></a>
           </li>    
            <li> <a href="https://www.facebook.com/RouxaVzla/" class="icon-facebook-squared"></a>
           </li>
             </ul>
         </div>
        
        <?php 
        include('pie.php');
        ?>
      
    </body>
</html>