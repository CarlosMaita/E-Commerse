<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//LECTURA DE VARIABLES 


    $correo = $_POST["correo"];
    $clave = $_POST["clave"];


//ESCRIBE EL COMANDO SQL
$sql = "SELECT * FROM USUARIO where correo='$correo'";

$result = $conn->query($sql);

if ($f = $result->fetch_assoc()) {
    // output data of each row
    if ($clave==$f['clave']) {
        
    echo 'Loggeado con exito!!';    
    }
            
} else {
    
    header ("Location: http://localhost/TiendaWeb/LogOff.php"); 
    
}
$conn->close();



