 <?php
             // put your code here
        session_start();
         $_SESSION['factura']=false;
?>
  <html>
   <head>
        <meta charset="UTF-8">
        <title>Rouxa</title>
           <link rel="stylesheet" href="css/Stile.css">
           <meta name="keywords"
content="ROUXA,ROPA,TIENDA ONLINE, ROPA VENEZUELA, ">
        <meta name="description"
content="Rouxa, tienda online de venta de ropa en Venezuela">


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
        
        <div class="container">
            <p class="texto-msn">Usted ha realizado la solicitud de compra de los siguiente(s) producto(s), por favor complete los siguientes datos  y confirme su compra.</p>
            
             <ul class="carrito-compras">
            <li>
                <ul id="linea-main">
                <li>...</li>
                <li>Producto</li>
                <li>Talla</li>
                <li>Precio</li>
                <li>Cantidad</li>
                <li>...</li>
                </ul>
            </li>
           
         <?php
                
       if(isset($_SESSION['carrito'])){
           $datos=$_SESSION['carrito'];
           $total=0;
           for($i=0;$i<count($datos);$i++){
              
               ?>
            <li>
                <ul id="linea-articulo">
                    <li></li>
                        <li><?php echo $datos[$i]['Nombre'];?></li>
                        <li><?php echo $datos[$i]['Talla']?></li>
                        <li><?php echo $datos[$i]['Precio'];?></li>
                        <li><?php echo $datos[$i]['Cantidad'];?></li>
                        <li></li>
                </ul>
            </li>
          <?php  $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
               
           } 
           
                ?>
             <li>
                <ul id="linea-total">
                       <li>Total</li>
                       <li> <?php echo $total;?> [Bs]</li>
                       
                </ul>
            </li>           
           <?php
           $_SESSION['total']=$total;
           
            }else{
           echo '<center><h2>No hay productos añadidos en el carrito</h2> </center>';
            }
          ?>
            
        </ul>
            </div>
            
             <form action="Cuentas_bancarias.php" method="POST"  onsubmit="return validacion()">
             
             <div class="container">
               <div class="datos-personales">
            
            <h1 id="title">Datos de Cliente</h1>
            
            <input type="text" placeholder="Nombre de cliente"  name="nombre-cliente" id="nombre-cliente" >
            
            <input type="text" placeholder="Número telefonico del Cliente" name="telf-cliente" id="telf-cliente" >
            
            <input type="text" placeholder="E-mail del Cliente" name="email-cliente" id="email-cliente" value="test_user_23718464@testuser.com" >
            
            <p class="check"><input  id="isfacture" type="checkbox" onclick="Factura()" name="isfacture" value='true'>Yo, deseo factura fiscal</p>
            
             <input type="text" placeholder="Razon Social" name="razon-social" id="razon-social" style="display: none"  >
            
             <select name="type-identidad" id="type-identidad" style="display: none" >
                <option>V</option>
                <option>E</option>
                <option>J</option>
                <option>P</option>
                <option>G</option>
                <option>Passaporte</option>
            </select> 
            
            <input type="text" placeholder="Registro Único de Información Fiscal  (RIF)" name="doc-identidad" id="doc-identidad" maxlength="30" style="display: none">
            
            <input type="text" placeholder="Direccion Fiscal" name="dir-fiscal" id="dir-fiscal" style="display: none" >
            
            <h1 id="title">Datos de Envio</h1>
            
             <input type="text" placeholder="Nombre y apellido del que recibe" name="receptor" id="receptor" >
            
            
            <select name="type-identidad-receptor" id="type-identidad-receptor" >
                <option>V</option>
                <option>E</option>
                <option>Passaporte</option>
            </select>
            <input type="text" placeholder="Documento de identidad del que recibe [ejemplo: 20184765]" name="doc-identidad-receptor" id="doc-identidad-receptor" maxlength="30">
            
             <input type="text" placeholder="Telefono del que recibe. Ejemplo: (+58) 414 9990000" name="telf-receptor" id="telf-receptor" >
             
            <select name="pais" id="pais">
                <option value="Venezuela">Venezuela</option>
                <option value="Colombia">Colombia</option>
                <option value="Chile">Chile</option>
                <option value="Panama">Panama</option>
            </select>
            
            
            
            <input type="text" placeholder="Estado | Departamento | Provincia" name="estado" id="estado" maxlength="30">
              
            <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad" maxlength="30">
                
            <input type="text" placeholder="Municipio | Localidad" name="municipio" id="municipio" maxlength="30"> 
            
            <input type="text" placeholder="Parroquia" name="parroquia" id="parroquia" maxlength="30"> 
            
            <input type="text" placeholder="Direccion -  Barrio | Zona | Sector | Casa | Apartamento | local | Edificio" name="direccion" id="direccion" maxlength="200">
            
            <input type="text" placeholder="Referencia" name="ref" id="ref" maxlength="200">
            
             <input type="text" placeholder="Codigo Postal" name="codigo-postal" id="codigo-postal" maxlength="20">
             
              <input type="text" placeholder="Observaciones de envio" name="observaciones" id="observaciones" maxlength="200">
            
            
            
                </div>
                        
                 
               <ul  class="ok-cancel">
                    <li></li>
                    <li>
                   
                    <input type="submit" id="boton6" value="Confirmar">  
                   </li>
                   <li><a href="Page_CarritoCompras.php" id="boton6">Atras</a></li>
                   <li>
                       <a href="index.php" id="boton6">Cancelar</a>
                   </li>
                   
                   <li></li>
               </ul>
            
              </div>
            
        </form>
    </body>
</html>