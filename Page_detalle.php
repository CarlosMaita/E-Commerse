<?php
  include 'Common/conexion.php';

    $lista_tallas='';

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
        <title>Rouxa</title>
        <link rel="stylesheet" href="css/Stile.css">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="shortcut icon" href="imagen/Logo.ico">
        <script>
        function  tablero(band){
              if(band){
                  document.getElementById("stock").style.background="#fff";
                   document.getElementById("pedido").style.background="#eee";

                  document.getElementById("stock-block").style.display="block";
                  document.getElementById("pedido-block").style.display="none";
              }else {
                  document.getElementById("pedido").style.background="#fff";
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
         
       <div class="page">
      
        <?php 
        include ('menu.php');
        ?>
         
            <?php 
            include 'Common/conexion.php';
            $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_GET["id"];
            $res= $conn->query($sql);
            
            while($f=$res->fetch_assoc()){
                         ?>        
     
      <div class="container">
      
      <div class="detalle">
       <div id="imagen">
               <img src="imagen/<?php echo $f['IMAGEN']; ?>" > 
       </div>
       <div id="texto">
       
        <ul class="menu-top">
              <li onclick="tablero(true)"><a id="stock">Stock</a></li>
              <li onclick="tablero(false)"><a  id="pedido">Solicitud de Pedido</a></li>
          </ul>
        <div id="stock-block"> 
                     <?php 
                    $nombre_p= $f["NOMBRE_P"] ; 
                    $des=$f["DESCRIPCION"];
                    $precio=$f["PRECIO"];
                    echo  '<h1 id="nombre-p">'.$nombre_p.'</h1>' ;
                    echo   '<p id="des">'.$des.'</p>'  ;
                    echo  '<p id="precio">'.number_format($precio, 2, ',', '.').' Bs</p>';

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
                <p id="dispo">
              Disponibilidad: <?php
                    echo $arreglo[1]['Cantidad']; ?> [piezas] 
           </p>
        </div>
       <center>
        <input type="submit" value="Comprar" id="boton6" >
       </center> 
     </form>
    </div>
        
<div id="pedido-block">
        <?php 
            echo  '<h1 id="nombre-p">'.$nombre_p.'</h1>' ;
            echo   '<p id="des">'.$des.'</p>'  ;
            echo  '<p id="precio">'.number_format($precio, 2, ',', '.').' Bs</p>';
        ?> 
       
    
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
            <p id="dispo">
                 Ponte en contacto con nosotros.
           </p>
        </div>
       <center>
        <input type="submit" value="Solicitar Producto" id="boton6" >
       </center> 
     </form>
          </div>
          
        
        
        </div>
            
        </div>
               
        
            </div>
       </div>
       
         <?php 
        include ('pie.php');
        ?>
    </body>
</html>