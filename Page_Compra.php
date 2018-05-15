<?php
    session_start();
    $_SESSION['factura']=false;
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
    
<script  type="text/javascript">
      
function validacion(){
    
    var r1=document.getElementById('nombre-cliente').value;
    var r3=document.getElementById('telf-cliente').value;
    var r4=document.getElementById('email-cliente').value;
   
    var checkBox = document.getElementById("isfacture");
    var r21=document.getElementById('razon-social').value;
    var r2=document.getElementById('doc-identidad').value;
    var r5=document.getElementById('dir-fiscal').value;
    
    var r6=document.getElementById('estado').value;     
    var r61=document.getElementById('ciudad').value;     
    var r7=document.getElementById('municipio').value; 
    var r71=document.getElementById('parroquia').value; 
    
    
    var r8=document.getElementById('direccion').value; 
    var r9=document.getElementById('ref').value;
    var r10=document.getElementById('codigo-postal').value;
    
    var r11=document.getElementById('receptor').value;     
    var r12=document.getElementById('doc-identidad-receptor').value;     
    var r13=document.getElementById('telf-receptor').value; 
            

    if (r1==null || r1.length==0){
        alert("Por favor, registre su nombre  como cliente.");
        return false;
    }
     else if (r3==null|| r3.length==0){
        alert("Por favor, registre un número telefonico de contacto.");
        return false;
    }
    
    else if (r4==null|| r4.length==0){
        alert("Por favor, registre un correo electronico de contacto.");
        return false;
    }    
    
       else if ((r21==null|| r21.length==0)&&(checkBox.checked)){
        alert("Por favor, registre la razon social de la factura.");
        return false;
    }
    else if ((r2==null|| r2.length==0)&&(checkBox.checked)){
        alert("Por favor, registre El Registro Único de Información Fiscal (RIF) de la factura.");
        return false;
    }
     
    else if ((r5==null|| r5.length==0) &&(checkBox.checked)){
        alert("Por favor, registre la direccion fiscal de la factura.");
        return false;
    }  
    
    
      else if (r11==null|| r11.length==0){
        alert("Por favor, registre a la persona que recibira el envio.");
        return false;
    }
    else if (r12==null|| r12.length==0){
        alert("Por favor, registre el documento de identidad de la persona que recibira el envio.");
        return false;
    }
    else if (r13==null|| r13.length==0){
        alert("Por favor, registre el numero telefonico donde se informara de su envio.");
        return false;
    }
   
    else if (r6==null|| r6.length==0){
        alert("Por favor, registre su estado.");
        return false;
    }
    
      else if (r61==null|| r61.length==0){
        alert("Por favor, registre su cuidad.");
        return false;
    }
              else if (r7==null|| r7.length==0){
        alert("Por favor, registre su municipio.");
        return false;
    }
       else if (r71==null|| r71.length==0){
        alert("Por favor, registre su parroquia.");
        return false;
    }
      else if (r8==null|| r8.length==0){
        alert("Por favor, rellene la direccion de envio.");
        return false;
    }
              else if (r9==null|| r9.length==0){
        alert("Por favor, informenos de un punto de referencia de la direccion de envio.");
        return false;
    }
             else if (r10==null|| r10.length==0){
        alert("Por favor, diganos el codigo postal de su zona.");
        return false;
    }
    
  
    
    return true;
}    
         
function Factura(){
                   // Get the checkbox
          var checkBox = document.getElementById("isfacture");
          // Get the output text
          var text1 = document.getElementById("doc-identidad");
          var text2 =  document.getElementById("type-identidad");
          var text3 =  document.getElementById("dir-fiscal");
          var text4 =  document.getElementById("razon-social");

          // If the checkbox is checked, display the output text
          if (checkBox.checked == true){
            text1.style.display = "block";
            text2.style.display = "block";
            text3.style.display = "block";
            text4.style.display = "block";
          
              
          } else {
            text1.style.display = "none";
            text2.style.display = "none";
            text3.style.display = "none";
            text4.style.display = "none";
               
           
          }
    }         
</script>
 
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Rouxa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio </a>
            </li>
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
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Solicitud de Compra</h1>
    <p class="lead">Usted ha realizado la solicitud del siguiente carrito de compra. Por favor, verifique, complete los campos de datos solicitados  y confirme su compra.</p>
  </div>

   
  <div  style="min-height: 10vh; width:auto">  
   <?php
        // put your code here
       if(isset($_SESSION['carrito'])){
              ?>
     
      <table class="table" style="font-size:0.9em;">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">Producto</th>
          <th scope="col">Talla</th>
          <th scope="col">Precio[Bs]</th>
          <th scope="col">Cantidad</th>
        </tr>
      </thead>
           <?php
           $datos=$_SESSION['carrito'];
           $total=0;
           for($i=0;$i<count($datos);$i++){
              
               ?> 

      <tbody>
       
        <tr>
          <td><?php echo $datos[$i]['Nombre'];?></td>
          <td><?php echo $datos[$i]['Talla']?></td>
          <td><?php echo number_format($datos[$i]['Precio'],2,',','.');?></td>
          <td><?php echo $datos[$i]['Cantidad'];?></td>
        </tr>
        
         <?php 
          $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
           }
              ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <table  class="table">
      <tbody>
         <tr>
          <th scope="row">Total</th>
          <td><?php echo number_format($total,2,',','.');?> [Bs]</td>
        </tr>     
      </tbody>
    </table>
   <?php
           $_SESSION['total']=$total;
            }else{
           echo '<center><h2>No hay productos añadidos en el carrito</h2></center>';
            }
    ?>
    
    
</div>  
  </div> 
  
    <form action="Cuentas_bancarias.php" method="POST"  onsubmit="return validacion()">      
    <div class="container">
            
            <h1  class="text-center">Datos de Cliente</h1>
            <div class="input-group mb-2">
                  <input type="text" placeholder="Nombre de cliente"  name="nombre-cliente" id="nombre-cliente" class="form-control" >
            </div>    
          
            <div class="input-group mb-2">
                  <input type="text" placeholder="Número telefonico del Cliente" name="telf-cliente" id="telf-cliente" class="form-control" >
            </div>  
            
            
            <div class="input-group mb-3">
                  <input type="text" placeholder="E-mail del Cliente" name="email-cliente" id="email-cliente" value="test_user_23718464@testuser.com" class="form-control"  >
            </div>
              
            <div class="mb-3 ">
                    <center>
                          <p>
                   <input  id="isfacture" type="checkbox" onclick="Factura()" name="isfacture" value="true"> Yo, deseo factura fiscal</p> 
                    </center>      
            </div>  
          
           <div class="input-group mb-2">
                <input type="text" placeholder="Razon Social" name="razon-social" id="razon-social" style="display: none"  class="form-control" >
            </div> 
             <div class="input-group mb-2">
                  <select name="type-identidad" id="type-identidad" style="display: none; border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px; "  >
                <option>V</option>
                <option>E</option>
                <option>J</option>
                <option>P</option>
                <option>G</option>
              </select> 
              <input type="text" placeholder="Registro Único de Información Fiscal  (RIF)" name="doc-identidad" id="doc-identidad" maxlength="30" style="display: none"  class="form-control">
            
            </div> 
            
             <div class="input-group mb-2">
                 <input type="text" placeholder="Direccion Fiscal" name="dir-fiscal" id="dir-fiscal" style="display: none" class="form-control">
            </div> 
              
              <h1 class="text-center">Datos de Envio</h1>
              
               <div class="input-group mb-2">
                 <input type="text" placeholder="Nombre y apellido del que recibe" name="receptor" id="receptor"class="form-control"  >
            </div> 
               <div class="input-group mb-2">
                <select name="type-identidad-receptor" id="type-identidad-receptor"  style="border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
                <option>V</option>
                <option>E</option>
                <option>Passaporte</option>
            </select>
            <input type="text" placeholder="Documento de identidad del que recibe [ejemplo: 20184765]" name="doc-identidad-receptor" id="doc-identidad-receptor" maxlength="30" class="form-control" >
            </div> 
              
            <div class="input-group mb-2">
                 <input type="text" placeholder="Telefono del que recibe. Ejemplo: (+58) 414 9990000" name="telf-receptor" id="telf-receptor" class="form-control" >                
            </div> 
            
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="pais">Pais</label>
              </div>
                   <select name="pais" id="pais" class="custom-select" >
                        <option value="Venezuela">Venezuela</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Chile">Chile</option>
                        <option value="Panama">Panama</option>
                    </select>
            </div>
            
            <div class="input-group mb-2" >
                 <input type="text" placeholder="Estado | Departamento | Provincia" name="estado" id="estado" maxlength="30" class="form-control" >
              
            </div> 
            
            <div class="input-group mb-2">
                 <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad" maxlength="30" class="form-control" >
            </div> 
            
            <div class="input-group mb-2">
                  <input type="text" placeholder="Municipio | Localidad" name="municipio" id="municipio" maxlength="30" class="form-control" > 
            
            </div> 
         
            
            <div class="input-group mb-2">
                  <input type="text" placeholder="Parroquia" name="parroquia" id="parroquia" maxlength="30" class="form-control" > 
            </div> 
         
            
            <div class="input-group mb-2">
                <input type="text" placeholder="Direccion -  Barrio | Zona | Sector | Casa | Apartamento | local | Edificio" name="direccion" id="direccion" maxlength="200" class="form-control" > 
            </div> 
         
            
            <div class="input-group mb-2">
                 <input type="text" placeholder="Referencia" name="ref" id="ref" maxlength="200" class="form-control" >
            </div> 
         
            
            <div class="input-group mb-2">
                    <input type="text" placeholder="Codigo Postal" name="codigo-postal" id="codigo-postal" maxlength="20" class="form-control" >
             
            </div> 
         
            
            <div class="input-group mb-4">
                
              <input type="text" placeholder="Observaciones de envio" name="observaciones" id="observaciones" maxlength="200" class="form-control" >
            </div> 
            
            
              <ul class="grupo-botones mb-3" >
               <li class="expand"> 
                 <input class="boton-exp" type="submit" value="Confirmar">
               </li>
               <li class="expand">
                    <input  class="boton-exp" type="reset" value="Limpiar Formulario"> 
               </li>
            </ul>
      
        </div>
        
        </form>              
  
  
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


