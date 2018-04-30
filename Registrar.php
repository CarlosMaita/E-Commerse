<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'usuario.php';

//LECTURA DE VARIABLES 
$correo = $_POST['correo'];
$clave =  $_POST['clave'];

$user= new usuario($correo, $clave, 1);
$user->guardar();
echo "<p><a href='index.php'>Regresar</a></p>";
