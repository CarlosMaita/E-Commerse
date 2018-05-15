<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Common/conexion.php';
include 'guardarimagen.php';

if ($iscreated){
//LECTURA DE VARIABLES 
$nombre_p = $_POST['nombre_p'];
$descripcion =  $_POST['descripcion'];
$genero= $_POST['genero'];
$tipo=$_POST['tipo'];
$precio =  $_POST['precio'];

//ESCRIBE EL COMANDO SQL
$sql = "INSERT INTO `PRODUCTO`(`NOMBRE_P`, `DESCRIPCION`, `GENERO`, `TIPO`, `PRECIO`, `IMAGEN`) VALUES ('$nombre_p','$descripcion','$genero','$tipo','$precio','$archivo')";


if ($conn->query($sql) === TRUE) {
    echo "<p>Nuevo PRODUCTO registrado</p>";
   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}else{
    echo 'producto no registrado, ocurrio un error'; 
}

$conn->close();


