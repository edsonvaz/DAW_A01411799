<?php

function conectar() {
    $conexion_bd = mysqli_connect("localhost","fer","micontra","RegistroPacientes");

    if ($conexion_bd == NULL) {
        die("No se pudo conectar a la base de datos");
    }

    $conexion_bd->set_charset("utf8");

    return $conexion_bd;
}

function desconectar($conexion_bd) {
    mysqli_close($conexion_bd);
}

function busqueda_pacientes($nombre) {

    $consulta = 'SELECT * ';
    $consulta .= 'FROM Paciente p ';
    $consulta .= 'WHERE p.nombre = '.$nombre.
    /*OR telefono=  '.$telefono;*/

    $conexion_bd = conectar();
    $resultados_consulta = $conexion_bd->query($consulta);

    $resultado = '<table id="pacientes">';
    $resultado .= '<tr><th>idPaciente</th><th>Nombre</th><th>telefono</th><th>RFC</th><th>fechaNacimiento</th><th>email</th><th>Direccion</th><th>razonSocial</th><th>codigoPostal</th><tr>';

    while ($row = mysqli_fetch_array($resultados_consulta, MYSQLI_ASSOC)) {
    //MYSQLI_NUM: Devuelve los resultados en un arreglo numérico
        //$row[0]
    //MYSQLI_ASSOC: Devuelve los resultados en un arreglo asociativo
        //$row["acusador"]
    //MYSQL_BOTH: Devuelve los resultados en un arreglo numérico y asociativo (Utiliza el doble de memoria)
        //$row[0] y $row["acusador"]

        $resultado .= '<tr>';
        $resultado .= '<td>'.$row["nombre"].'</td>';
        /*$resultado .= '<td>'.$row["telefono"].'</td>';*/
        $resultado .= '</tr>';
    }

    mysqli_free_result($resultados_consulta); //Liberar la memoria

    $resultado .= '</table>';

    desconectar($conexion_bd);
    return $resultado;
}
/*busqueda_pacientes("%edson%");*/
?>
