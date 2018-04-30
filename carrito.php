<?php
    session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
           <link rel="stylesheet" href="css/Stile.css">
           <link rel="stylesheet" href="css/fontello.css">
    </head>
    <body>
        <?php
        // put your code here
        include 'Common/conexion.php';
   
        

if (isset($_SESSION['carrito'])){
    $band =false;
    if(isset($_POST['cantidad'])){
        $cantidad=$_POST['cantidad'];
        $band =true;
    }
    
    if(isset($_POST['id'])){
    
    $arreglo=$_SESSION['carrito'];
    $encontro=FALSE;
    $numero=0;
        
    if(!$band){
        $cantidad=1;
    }
    
    for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['Id']==$_POST['id']){
            if($arreglo[$i]['Talla']==$_POST['talla']){
            $encontro =TRUE;
            $numero=$i;
    
            }
        }
    }
    if($encontro==true){
        $arreglo[$numero]['Cantidad']= $arreglo[$numero]['Cantidad']+$cantidad;
        $_SESSION['carrito']=$arreglo;
        
    }else{
        $nombre ="";
        $precio=0;
        $imagen="";
        
        $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_POST['id'];
        $res = $conn->query($sql);
        while($f = $res->fetch_assoc()){
                $nombre=$f["NOMBRE_P"];
                $precio=$f["PRECIO"];
                $imagen=$f["IMAGEN"];
            }
        $newarreglo=array('Id'=>$_POST["id"],'Nombre'=>$nombre, 'Precio'=>$precio, 'Imagen'=> $imagen, 'Cantidad'=>$cantidad, 'Talla'=>$_POST['talla']);
        
        array_push($arreglo,$newarreglo);
        $_SESSION['carrito']=$arreglo;
    }
    }
}else {
    $band=false;
    if (isset($_POST["cantidad"])){
        $cantidad=$_POST["cantidad"];
        $band=true;
    }
    
    if (isset($_POST["id"])){
        $nombre ="";
        $precio=0;
        $imagen="";
        
        if(!$band){
            $cantidad=1;
        }
        
        $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_POST["id"];
        $res = $conn->query($sql);
        while($f = $res->fetch_assoc()){

                $nombre=$f["NOMBRE_P"];
                $precio=$f["PRECIO"];
                $imagen=$f["IMAGEN"];
            }
        $arreglo[]=array('Id'=>$_POST["id"],'Nombre'=>$nombre, 'Precio'=>$precio, 'Imagen'=> $imagen, 'Cantidad'=>$cantidad, 'Talla'=>$_POST['talla']);
        $_SESSION['carrito']=$arreglo;
    }
    
}

        ?>
        <?php 
        include ('menu.php');
        ?>
         
       <div class="page">
      
        <div class="container">
           <h1 id="letra1">
        Carrito de Compras
         </h1>
         
               
            <form action="Page_Compra.php" method="GET">
        <ul class="carrito-compras">
            <li>
                <ul id="linea-main">
                <li>...</li>
                <li>Producto</li>
                <li>Talla</li>
                <li>Precio[Bs]</li>
                <li>Cantidad</li>
                <li>...</li>
                </ul>
            </li>
         <?php
        // put your code here
       if(isset($_SESSION['carrito'])){
           $datos=$_SESSION['carrito'];
           $total=0;
           for($i=0;$i<count($datos);$i++){
              
               ?>
            <li>
                <ul id="linea-articulo">
                    <li><div id="imagen-lista"><img src="imagen/<?php echo $datos[$i]['Imagen'];?>" alt=""></div></li>
                        <li><?php echo $datos[$i]['Nombre'];?></li>
                        <li><?php echo $datos[$i]['Talla']?></li>
                        <li><?php echo $datos[$i]['Precio'];?></li>
                        <li><?php echo $datos[$i]['Cantidad'];?></li>
                        <li></li>
                </ul>
            </li>
          <?php 
          $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
           
               
           }
           
           
                ?>
             <li>
                <ul id="linea-total">
                       <li>Total</li>
                       <li> <?php echo $total;?> [Bs]</li>
                       
                </ul>
            </li>           
           <?php
                     
            }else{
           echo '<center><h2>No hay productos añadidos en el carrito</h2> </center>';
            }
          ?>
            
         
        </ul>
           <ul class="ok-cancel">
               <li> 
                 <input id="boton6" type="submit" value="Comprar">
               </li>
               <li>
                     <a href="index.php" id="boton6">Añadir otro producto</a> 
               </li>
               <li>
                   <a href="index.php?reset=''" id="boton6">Limpiar carrito</a> 
               </li>
               
           </ul>
           
        </form>
           
        </div>
            </div>
       <?php 
        include ('pie.php');
        ?>
    </body>
</html>
