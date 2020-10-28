<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

</script>

<?php
function conectar(){
    $conexion_bd=
    mysqli_connect("localhost","root","","jurassicpark");
    
    if ($conexion_bd==NULL){
        die("No se pudo conectar a la base de datos.");
    }
    
    return $conexion_bd;
}

function desconectar($conexion_bd){
    mysqli_close($conexion_bd);
}

function select_incidente_ubicacion($name,$tabla, $nombre="nombre"){
    $resultado= '<div class="input-field col s12"><select name='.$name.'">';
    $resultado.='<option value="" disabled selected>Selecciona un '.$tabla.':</option>';
    $conexion_bd=conectar();

$consulta='SELECT '.$nombre.' FROM '.$tabla;
$resultados_consulta=$conexion_bd->query($consulta);
    
while ($row=mysqli_fetch_array($resultados_consulta,MYSQLI_BOTH)){
$resultado.='<option value="'.$row[$nombre].'">'.$row[$nombre].'</option>';
}

mysqli_free_result($resultados_consulta);
    
if ($tabla=="lugar"){
   $resultado .= '</select></div><label>Consulte los lugares del parque.</label>';
    desconectar($conexion_bd);
    return $resultado; 
}else{
    $resultado .= '</select></div><label>Consulte los tipos de incidentes</label>';
    desconectar($conexion_bd);
    return $resultado;
}
    
}

function reportar($ubicacion, $incidente){
     $conexion_bd = conectar();
     
     $consulta = "INSERT INTO incidente(ubicacion, incidente) VALUES (?,?)";
     
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

function tabla_reportes() {
    $conexion_bd = conectar();
     
    $consulta =
        "SELECT ubicacion, incidente, ReportadoEn as fecha
        FROM incidente
        ORDER BY fecha DESC";
   
     $resultados_consulta = $conexion_bd->query($consulta);  
     $resultado = '<table class="table" style="text-align: center" id="oopsies">';
     $resultado .= '<thead class="red darken"><tr><th style="color:black">UBICACIÓN</th><th style="color:black">INCIDENTE</th><th style="color:black">FECHA</th><tr></thead>';
     
     while ($row = mysqli_fetch_array($resultados_consulta, MYSQLI_ASSOC)) { 
         
        $resultado .= '<tr>';
        $resultado .= '<td>'.$row["ubicacion"].'</td>';
        $resultado .= '<td>'.$row["incidente"].'</td>';
        $resultado .= '<td>'.$row["fecha"].'</td>';
        $resultado .= '</tr>';
     }
        desconectar($conexion_bd);
        return $resultado;
}

?>