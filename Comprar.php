<?php


include 'Common/conexion.php';



//LECTURA DE VARIABLES 
$nombre_cliente =$_POST['nombre-cliente'];
$telf_cliente=$_POST['telf-cliente'];
$email_cliente=$_POST['email-cliente'];      


$monto=  $_SESSION['total'];
if(isset($_POST['isfacture'])){
    $razon=$_POST['razon-social'];  
    $identidad=$_POST['type-identidad'].'-'.$_POST['doc-identidad'];  
    $dir_fiscal=$_POST['dir-fiscal'];
}else{
    $razon='NULL';  
    $identidad='NULL';  
    $dir_fiscal='NULL';
}




$STATUS_START=0;

//ESCRIBE Los COMANDOS SQLs
$sqla="SELECT `VALUE` FROM  VARIABLES WHERE `NOMBRE`='CS'";

$result = $conn->query($sqla);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $CS = $row["VALUE"];
    }
}  

$CS=$CS+1;

$sqlb="UPDATE `VARIABLES` SET `VALUE`='$CS' WHERE `NOMBRE`='CS';";

if ($conn->query($sqlb) === TRUE) {
   
   } else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
}

$sqlc="SELECT `IDPEDIDO` FROM `pedidos` WHERE `EMAIL`='$email_cliente' AND `ESTATUS`='$STATUS_START'";


$result = $conn->query($sqlc);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     $id=$row['IDPEDIDO'];
        
        $sqld="
        DELETE p,c,i,e
        FROM PEDIDOS p
          LEFT JOIN COMPRAS c
          ON c.idpedido=p.idpedido
          LEFT JOIN ITEMS i
          ON i.idpedido=p.idpedido
           LEFT JOIN ENVIOS e
          ON e.idpedido=p.idpedido
        WHERE p.idpedido = '$id';";
            
          if ($conn->query($sqld) === TRUE) {
               
               } else {
                echo "Error: " . $sqld . "<br>" . $conn->error;
            }
        }
         
    }

    
$sql0="
DELETE FROM PEDIDOS WHERE ESTATUS=0 AND EMAIL='$email_cliente';";

if ($conn->query($sql0) === TRUE) {
  
   } else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
}
  
$md5= md5($CS);
$sql1 = "INSERT INTO PEDIDOS (IDPEDIDO,CLIENTE,TELEFONO,EMAIL,ESTATUS, FECHAPEDIDO) VALUES ( MD5('$md5'),'$nombre_cliente', '$telf_cliente', '$email_cliente', '$STATUS_START', CURRENT_DATE());";


if ($conn->query($sql1) === TRUE) {
   
   } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


$sql2="INSERT INTO `COMPRAS`( `IDPEDIDO`, `MONTO`, `RAZONSOCIAL`, `RIFCI`, `DIRFISCAL`) VALUES (MD5('$md5'), '$monto', '$razon',' $identidad','$dir_fiscal');"; 

if ($conn->query($sql2) === TRUE) {
    
   } else {
    echo "Error: " . $sql0 . "<br>" . $conn->error;
}



   if(isset($_SESSION['carrito'])){
        $datos=$_SESSION['carrito'];
           for($i=0;$i<count($datos);$i++){
        
        $dato1=  $datos[$i]['Id'];
        $dato2=  $datos[$i]['Talla'];
        $dato3=  $datos[$i]['Cantidad'];
        $dato4=  $datos[$i]['Precio'];
        
                    
        $sql3="SELECT IDINVENTARIO FROM INVENTARIO  WHERE IDPRODUCTO= '$dato1' AND TALLA= '$dato2' ; ";
               
        $res = $conn->query($sql3);
        $f = $res->fetch_assoc();
        $id_inv=$f["IDINVENTARIO"];       
               
        $sql4="INSERT INTO `ITEMS`(`IDPEDIDO`, `IDINVENTARIO`, `CANTIDAD`, `PRECIO`) VALUES (MD5('$md5'),'$id_inv' ,'$dato3', '$dato4');"; 
               
       if ($conn->query($sql4) === TRUE) {
         
           } else {
            echo "Error: " . $sql4 . "<br>" . $conn->error;
        }

               
           }
             
   }

    $receptor=$_POST['receptor'];
    $receptor_ci = $_POST['type-identidad-receptor'].'-'.$_POST['doc-identidad-receptor'] ;
    $receptor_tel=$_POST['telf-receptor'];
//direccion
    $pais=$_POST['pais'];
    $estado=$_POST['estado'];
    $ciudad=$_POST['ciudad'];
    $municipio=$_POST['municipio'];  
    $parroquia=$_POST['parroquia'];      
    $direccion = $_POST['direccion'].', '.$_POST['ref'];
    $codigo_postal=$_POST['codigo-postal'];
    $observaciones=$_POST['observaciones'];




$sql="INSERT INTO `ENVIOS`( `IDPEDIDO`, `PAIS`, `ESTADO`, `CIUDAD`, `MUNICIPIO`, `PARROQUIA`, `DIRECCION`, `CODIGOPOSTAL`, `RECEPTOR`, `CIRECEPTOR`, `TELFRECEPTOR`, `OBSERVACIONES`, `GUIA`) VALUES (MD5('$md5'),'$pais','$estado','$ciudad','$municipio','$parroquia','$direccion', '$codigo_postal','$receptor', '$receptor_ci' , '$receptor_tel','$observaciones', NULL)";

 if ($conn->query($sql) === TRUE) {
       
       } else {
        echo "Error: " .$sql. "<br>" . $conn->error;
    }


$conn->close();