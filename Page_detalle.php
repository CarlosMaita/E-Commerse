<?php
  include 'Common/conexion.php';

    $lista_tallas='';
if(isset($_GET['id'])){
        $sql= 'select TALLA,CANTIDAD from INVENTARIO where IDPRODUCTO='.$_GET["id"];
            $res= $conn->query($sql);   
            $arreglo[] = NULL;

           if ($res->num_rows > 0) {

            while($f=$res->fetch_assoc()){

                $lista_tallas=$lista_tallas.'<option value="'.$f['TALLA'].'">'.$f['TALLA'].'</option>';

                $newarreglo=array('Talla'=>$f['TALLA'], 'Cantidad'=> $f['CANTIDAD']);
                array_push($arreglo,$newarreglo);

            }

           }else{
               $lista_tallas='<option value="N/D">N/D</option>';
                 $newarreglo=array('Talla'=>'N/D', 'Cantidad'=>'0');
                 array_push($arreglo,$newarreglo);
            }
    
}
    
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="es">
    <head>
        <meta charset="UTF-8">
        
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
      
        <script>
        function  tablero(band){
              if(band){
                  document.getElementById("stock").style.background="none";
                   document.getElementById("pedido").style.background="#eee";

                  document.getElementById("stock-block").style.display="block";
                  document.getElementById("pedido-block").style.display="none";
              }else {
                  document.getElementById("pedido").style.background="none";
                   document.getElementById("stock").style.background="#eee";


                  document.getElementById("stock-block").style.display="none";
                document.getElementById("pedido-block").style.display="block";
              }
          } 
          
        function validacion(){
    
    var r1=document.getElementById('cant').value;
    var r2=document.getElementById('search').value;
            
    
    if (r1==null|| r1.length==0){
        alert("No existe cantidad de piezas");
        return false;
    }
    else if (r2==null || r2.length==0){
        alert("No se ha seleccionado un Talla");
        return false;
    }
    else if( !(r2=="S" || r2=="M" || r2=="L"|| r2=="XL"|| r2=="XXL"|| r2=="XS"|| r2=="XXS") ){
        alert("Talla no valida");
        return false;
    }
    return true;
}    
</script>
   
    <script>
   
            
    function talla_dis(){
        var talla = document.getElementById('search').value;
       
        switch(talla){
             <?php
              for($i=1; $i<count($arreglo);$i++){
                ?>  
                 case '<?php echo $arreglo[$i]['Talla'];?>': 
                    /*primer objetivo - modificar mensaje*/
                    document.getElementById('dispo').textContent='Disponibilidad: <?php echo $arreglo[$i]['Cantidad'];?> [piezas]';

                    /*Segundo objetivo - cantidad max ajustadas*/
                    document.getElementById('cant').max='<?php echo $arreglo[$i]['Cantidad'];?>';
                break;
                
                <?php  
              }
                ?>
                
            }
    }
          
    </script>
      
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
            
            <li class="nav-item active">
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
    
    
        <?php 
         
            $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_GET["id"];
            $res= $conn->query($sql);
            
            while($f=$res->fetch_assoc()){
                         ?>        
     
   
    <div class="detalle-block ">
      
      <div class="detalle ">
     <nav id="imagen">
               <img src="imagen/<?php echo $f['IMAGEN']; ?>" > 
       </nav>
       
       <nav id="texto"  >
        <ul class="menu-top">
              <li onclick="tablero(true)"><a id="stock" >Stock</a></li>
              <li onclick="tablero(false)"><a  id="pedido">Solicitud de Pedido</a></li>
          </ul>
        <div id="stock-block"> 
                     <?php 
                    $nombre_p= $f["NOMBRE_P"] ; 
                    $des=$f["DESCRIPCION"];
                    $precio=$f["PRECIO"];
                 ?>
                <h1 class="text-muted" id="nombre-p"><?php  echo  $nombre_p; ?> </h1>
                <p id="des"> <?php  echo  $des; ?> </p>
                <p id="precio" class="text-primary">   <?php  echo  number_format($precio, 2, ',', '.'); ?>   Bs</p>
                                       
                               <?php
                                }
                                ?>
     <form action="carrito.php" method="POST" onsubmit="return validacion()">
        <div class="cantidad">
           <ul>
                    <li>
                       <select name="talla" id="search" onchange="talla_dis()" >
                           <?php echo $lista_tallas;?>
                       </select>
                       
                   </li>
                   <li>
                        <input type="number" max="<?php
                    echo $arreglo[1]['Cantidad']; ?>" min="1" maxlength="4" value="1" name="cantidad"
                    id="cant" >
                        <input type="text" name="id" value="<?php echo $_GET["id"];?>" hidden="hidden">
                   </li>
           </ul>
                <p id="dispo" class="text-dark">
              Disponibilidad: <?php
                    echo $arreglo[1]['Cantidad']; ?> [piezas] 
           </p>
        </div>
       <center>
        <input type="submit" value="Comprar"  class="btn btn-primary btn-lg btn-block py-4" >
       </center> 
     </form>
    </div>
        
<div id="pedido-block">
        <h1 class="text-muted" id="nombre-p"><?php  echo  $nombre_p; ?> </h1>
                <p id="des"> <?php  echo  $des; ?> </p>
                <p id="precio" class="text-primary">  <?php  echo  number_format($precio, 2, ',', '.'); ?>   Bs</p>
       
    
      <form action="Contactanos.php" method="POST" >
        <div class="cantidad">
           <ul>
                   <li>
                     <select name="talla" id="search">
                                <option value="XXL">XXL</option>  
                                <option value="XL">XL</option>  
                                <option value="L">L</option>  
                                <option value="M">M</option>        
                                <option value="S">S</option>  
                                <option value="XS">XS</option>  
                                <option value="XXS">XXS</option>  
                      </select> 
                   
               </li>
                   <li>
                    <input type="number" max="9999" min="1" maxlength="4" value="1" name="cantidad"
                    id="cant" >
                   <input type="text" name="id" value="<?php echo $_GET["id"];?>" hidden="hidden">
               </li>
                 
           </ul>
            <p id="dispo" class="text-dark">
                 Ponte en contacto con nosotros.
           </p>
        </div>
       <center>
        <input type="submit" value="Solicitar Producto" class="btn btn-primary btn-lg btn-block py-4"  >
       </center> 
     </form>
          </div>
          
        
        
        </nav>
            
        </div>
               
        
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