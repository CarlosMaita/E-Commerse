<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Common/conexion.php';
include 'guardarimagen.php';

//LECTURA DE VARIABLES 
$nombre_p = $_POST['nombre_p'];
$descripcion =  $_POST['descripcion'];
$color =  $_POST['color'];
$precio =  $_POST['precio'];

//ESCRIBE EL COMANDO SQL
$sql = "INSERT INTO PRODUCTO (NOMBRE_P,DESCRIPCION, COLOR,PRECIO,IMAGEN) 
	VALUES ('$nombre_p', '$descripcion',  '$color', '$precio','$archivo' )";


if ($conn->query($sql) === TRUE) {
    echo "<p>Nuevo PRODUCTO registrado</p>";
   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();