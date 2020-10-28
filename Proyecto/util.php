<?php

function conectarBD(){
    $host="localhost";
    $name="fer";
    $pass="micontra";
    $dbname="RegistroPacientes";
    
    
        $conexion_bd = mysqli_connect($host,$name,$pass,$dbname);
    
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $conexion_bd;
    
}

function desconectarBD($mysql){
    mysql_close($mysql);
}

function getPacientes(){
    $con = conectarBD();
    
    $sql = "SELECT nombre FROM Paciente";
    $result = mysqli_query($con, $sql);
    desconectarBD($con);
    return $result; 
}

function insertPaciente($nombre, $telefono, $rfc, $fechaNacimiento, $email, $direccion, $razonsocial, $codigoportal, $emailfacturacion){
    $con = conectarBD();   
    
    $sql= "INSERT INTO Paciente (nombre, telefono, RFC, fechaNacimiento, email, direccion, razonSocial, codigoPostal) VALUES ( ".$nombre.", ".$telefono.", ".$RFC.",".$fechaNacimiento.", ".$email.", ".$direccion.", ".$razonSocial.", ".$codigoPostal.")";
        $result   = mysqli_query($con, $sql);
    
    if(mysqli_query($con, $query)){
        echo "Nuevo registro creado";
        desconectarBD($con);
        return true;
    }else{
        echo "Error: ".$sql."<br>".mysqli_error($con);
        desconectarBD($con);
        return false;
    }
    
    desconectarBD($con);
        
    }
    


insertPaciente("RicardoCamarena", 4434434433, "CAAR01011999", "1999-01-01", "ricardo@email.com", "La direccion de su casa",NULL, 58049, NULL);


?>