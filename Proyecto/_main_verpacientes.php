
<?php 
    require("conexion_bd.php");
     ?>


<main class="main"> 
    
    
    <nav >
            <ul style="color:darkgrey;" >
              <a href="dashboard.php" style="color:blue">Inicio</a>  
                / <a style="color:slategray" href="pacientes.php">Pacientes</a>
            </ul>
    </nav>
    <h1>Acceso Rápido</h1>
<div  style="height: auto">
   <form method="post">
    <table class="a">
        <tr>
            <td><label >Nombre</label></td>
            <td><label>Número de Teléfono</label></td>
        </tr>
        
        <tr>
            <td><input name="buscaNombre"  type=text ></td>
            <td><input name="buscaNumero" type=text ></td>
        </tr>
        <tr>
            <td><input id="Buscar" name="submit" class="submit" type="submit" value="buscar" ></td>
        </tr>
    </table>
    </form>   

    
<div>
    <table class="a" style="color:black">
    <tr>
        <td><em>Nombre</em></td>
        <td><em>Número</em></td>
        <td><em>Expediente</em></td>
    </tr>
  <?php
        if(isset($_POST['submit'])){
          
        $conexion_bd = conectar();
        $consulta = "SELECT * FROM Paciente WHERE nombre LIKE '%".$_POST['buscaNombre']."%'"; 
        var_dump($ejecutarConsulta);
        $ejecutarConsulta = mysqli_query($conexion_bd, $consulta);
        $verFilas = mysqli_num_rows($ejecutarConsulta);
        $fila = mysqli_fetch_array($ejecutarConsulta);
        if(!$ejecutarConsulta){
            echo"Error en la consulta";
        }else{
            if($verFilas<1){
                echo"<tr><td>Sin registros</td></tr>";
            }else{
                for($i=0; $i<=$verFilas; $i++){
				echo'
				    <tr>
				    <td>'.$fila[1].'</td>
				    <td>'.$fila[3].'</td>
				    <a href="dashboard.php"><td></td></a>
				    </tr>
				';
                    $fila = mysqli_fetch_array($ejecutarConsulta);
                }
            }
        }}
    ?>
    
    </table>
    
</div>
    
 
</div>
</main>
</div>

