<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

</script>

<?php
function conectar(){
    $conexion_bd=
    mysqli_connect("localhost","root","","db_consultoriovalles");
    
    if ($conexion_bd==NULL){
        die("No se pudo conectar a la base de datos.");
    }
    
    return $conexion_bd;
}

function desconectar($conexion_bd){
    mysqli_close($conexion_bd);
}

function select_doctor($name,$tabla,$idEmpleado="idEmpleado", $nombre="nombre"){
    $resultado= '<div class="input-field col s12"><select name='.$name.'class="browser-default">';
    $resultado.='<option value="" disabled selected>Selecciona un '.$tabla.':</option>';
    $conexion_bd=conectar();

$consulta='SELECT '.$idEmpleado.','.$nombre.' FROM '.$tabla;
$resultados_consulta=$conexion_bd->query($consulta);
    
while ($row=mysqli_fetch_array($resultados_consulta,MYSQLI_BOTH)){
$resultado.='<option value="'.$row[$idEmpleado].'">'.$row[$nombre].'</option>';
}

mysqli_free_result($resultados_consulta);
    
$resultado .= '</select><label> Usuario que generará el reporte.</label></div>';
    desconectar($conexion_bd);
    return $resultado;
}

function select_paciente($name,$tabla,$idPaciente="idPaciente", $nombre="nombre"){
    $resultado= '<div class="input-field col s12"><select name='.$name.'class="browser-default">';
    $resultado.='<option value="" disabled selected>Selecciona un '.$tabla.':</option>';
    $conexion_bd=conectar();

$consulta='SELECT '.$idPaciente.','.$nombre.' FROM '.$tabla;
$resultados_consulta=$conexion_bd->query($consulta);
    
while ($row=mysqli_fetch_array($resultados_consulta,MYSQLI_BOTH)){
$resultado.='<option value="'.$row[$idPaciente].'">'.$row[$nombre].'</option>';
}

mysqli_free_result($resultados_consulta);
    
$resultado .= '</select><label> Paciente a quien se le hará su presupuesto dental.</label></div>';
    desconectar($conexion_bd);
    return $resultado;
}

function presupuesto($idEmpleado,$idPaciente,$diagnostico,$fechaEmision){
    $conexion_bd=conectar();
    
    $consulta="INSERT INTO diagnostico(idEmpleado,idPaciente,diagnostico,fechaEmision) VALUES (?,?,?,?)";
    
    if(!($statement = $conexion_bd->prepare($consulta))) {
         die("Error(".$conexion_bd->errno."): ".$conexion_bd->error);
     }
    
    if(!($statement->bind_param("ssss",$idEmpleado, $idPaciente,$diagnostico,$fechaEmision))) {
         die("Error de vinculación(".$statement->errno."): ".$statement->error);
     }
    
     if(!$statement->execute()) {
         die("Error en ejecución de la consulta(".$statement->errno."): ".$statement->error);
     }
    
    desconectar($conexion_bd);
}

function tabla_presupuestos() {
    $conexion_bd = conectar();
     
    $consulta = "SELECT em.nombre as doctor, pac.nombre as paciente, d.diagnostico, d.fechaEmision as fecha
FROM empleado em, paciente pac, diagnostico d
WHERE em.idEmpleado=d.idEmpleado AND pac.idPaciente=d.idPaciente
ORDER BY fecha DESC";
     
     $resultados_consulta = $conexion_bd->query($consulta);  
     $resultado = '<table class="table">';
     $resultado .= '<thead class="thead-dark"><tr><th scope="col">Doctor</th><th  scope="col">Paciente</th><th scope="col">Diagnostico</th><th scope="col">Fecha</th><tr></thead>';
     
     while ($row = mysqli_fetch_array($resultados_consulta, MYSQLI_ASSOC)) { 
         
        $resultado .= '<tr>';
        $resultado .= '<td>'.$row["doctor"].'</td>';
        $resultado .= '<td>'.$row["paciente"].'</td>';
        $resultado .= '<td>'.$row["diagnostico"].'</td>';
        $resultado .= '<td>'.$row["fecha"].'</td>';
        $resultado .= '</tr>';
     }
        desconectar($conexion_bd);
        return $resultado;
}

?>
