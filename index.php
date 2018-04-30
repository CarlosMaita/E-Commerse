 <?php
    session_start();
include 'Common/conexion.php';
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
        if(isset($_GET['reset']))
          session_destroy();
        ?>
        <div class="page">
             
          <?php 
        include ('menu.php');
        ?>
         <div class="qs">
           <img src="imagen/Quienes%20Somos.png" alt="">
            <h1 id="qs-titulo">¿Quiénes Somos?</h1>
            <p id="qs-parrafo">
                Somos una nueva empresa Venezolana fabricantes de ropa de alta calidad y confort. <a href="QuienesSomos.php">Leer más</a>
            </p>
        </div>
          
        <div class="container">
        
         <div class="galeria">
               <?php 
                     
                     $sql = "SELECT * FROM PRODUCTO";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                     // output data of each row
                        while($row = $result->fetch_assoc()) {
                            
                            ?>
         
                                <div class="producto"><div id="imagen"><img src="imagen/<?php echo $row['IMAGEN']; ?>" ></div>
                                <p id="producto-nombre">
                                 <?php echo $row['NOMBRE_P']; ?>
                                </p>
                                <p><?php echo number_format($row['PRECIO'], 2, ',', '.'); ?> Bs</p>
                                <p><a id="boton4"  href="Page_detalle.php?id=<?php echo $row['IDPRODUCTO']; ?>" >Descripción</a></p>
                                </div>
                                     <?php
                        }
                    } else {
                         
                        echo " <p> Aun no existen productos en Vitrina</p>";
                    }
                  
                    
                             
                 ?>
          
         </div>
        
        </div>
         
         <div class="container">
             <ul class="redes-sociales">
                 <li> <a href="https://www.instagram.com/rouxavzla/" class="icon-instagram"></a>
           </li>    
            <li> <a href="https://www.facebook.com/RouxaVzla/" class="icon-facebook-squared"></a>
           </li>
             </ul>
         </div>
         
       
            <ul class="contador-visitas">
                <li>
                    <p id="contador-cant">
                    <?php
                    
                    //ESCRIBE Los COMANDOS SQLs
                    $sqla="SELECT `VALUE` FROM `variables` WHERE `NOMBRE`='VPP' LIMIT 1" ;

                    $result = $conn->query($sqla);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                           $VPP = $row["VALUE"];
                        }
                    }  

                    $VPP=$VPP+1;

                    $sqlb="UPDATE `variables` SET `VALUE`='$VPP' WHERE `NOMBRE`='VPP';";

                    if ($conn->query($sqlb) === TRUE) {

                       } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                    }
                        echo '+'.$VPP ;

                        ?>
                    
                    </p>
                    <p id="contador-text">visitas</p>
                   
                </li>
                <li>
                    <p id="contador-cant">
                    <?php
                         //ESCRIBE Los COMANDOS SQLs
                    $sqla="SELECT `VALUE` FROM `variables` WHERE `NOMBRE`='CE' LIMIT 1" ;

                    $result = $conn->query($sqla);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                           $CE = $row["VALUE"];
                        }
                    }  
                        echo '+'.$CE;
                        ?>
                    
                    
                   </p>
                    <p id="contador-text">Compras</p>
                </li>
            </ul>
        </div>
        
            
            
        <?php 
        include ('pie.php');
          $conn->close();
        ?>
    </body>
</html>
