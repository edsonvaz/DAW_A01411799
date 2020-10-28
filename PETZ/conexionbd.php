<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

</script>

<?php
function conectar(){
    $conexion_bd=
    mysqli_connect("localhost","root","","PETZ");
    
    if ($conexion_bd==NULL){
        die("No se pudo conectar a la base de datos.");
    }
    
    return $conexion_bd;
}

function desconectar($conexion_bd){
    mysqli_close($conexion_bd);
}

function select_zombie($name,$tabla, $nombre="nombre"){
    $resultado= '<div class="input-field col s12"><select name='.$name.'">';
    $resultado.='<option value="" disabled selected>Selecciona un '.$tabla.':</option>';
    $conexion_bd=conectar();

$consulta='SELECT '.$nombre.' FROM '.$tabla;
$resultados_consulta=$conexion_bd->query($consulta);
    
while ($row=mysqli_fetch_array($resultados_consulta,MYSQLI_BOTH)){
$resultado.='<option value="'.$row[$nombre].'">'.$row[$nombre].'</option>';
}

mysqli_free_result($resultados_consulta);
    
   $resultado .= '</select></div><label>Consulte los zombies registrados.</label>';
    desconectar($conexion_bd);
    return $resultado;  
}

function select_estado($stat,$tabla, $nombre="nombre"){
    $resultado= '<div class="input-field col s12"><select name='.$stat.'">';
    $resultado.='<option value="" disabled selected>Selecciona un '.$tabla.':</option>';
    $conexion_bd=conectar();

$consulta='SELECT '.$stat.' FROM '.$tabla;
$resultados_consulta=$conexion_bd->query($consulta);
    
while ($row=mysqli_fetch_array($resultados_consulta,MYSQLI_BOTH)){
$resultado.='<option value="'.$row[$stat].'">'.$row[$stat].'</option>';
}

mysqli_free_result($resultados_consulta);
    
   $resultado .= '</select></div><label>Consulte los estados posibles.</label>';
    desconectar($conexion_bd);
    return $resultado;  
}

function reportar($ubicacion, $incidente){
     $conexion_bd = conectar();
     
     $consulta = "INSERT INTO zombie_estado(zombid, statid) VALUES (?,?)";
     
     if(!($statement = $conexion_bd->prepare($consulta))) {
         die("Error(".$conexion_bd->errno."): ".$conexion_bd->error);
     }
     
     if(!($statement->bind_param("ss",$acusador_id, $acusado_id))) {
         die("Error de vinculación(".$statement->errno."): ".$statement->error);
     }
     
     if(!$statement->execute()) {
         die("Error en ejecución de la consulta(".$statement->errno."): ".$statement->error);
     }
     
     desconectar($conexion_bd);
 }

?>