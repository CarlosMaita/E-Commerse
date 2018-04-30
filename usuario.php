<?php

class usuario{
    
public  $correo;
public  $clave;
public  $permiso;

public function __construct($correo,$clave,$permiso) {
    $this->correo= $correo;
    $this->clave= $clave;
    $this->permiso=$permiso;
}


public function guardar(){
 
include './Common/conexion.php';
    
    //ESCRIBE EL COMANDO SQL
    $sql = "INSERT INTO USUARIO ( correo, clave, permiso) VALUES ( '$this->correo', MD5('$this->clave'), '$this->permiso')";
    if ($conn->query($sql) === TRUE) {
    echo 'Registrado';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

                
                
 $conn->close();
}

}
