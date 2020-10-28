<?php
include("conexionbd.php");
?>

<!DOCTYPE html>
<html lang="en">

<body style="background-color: aliceblue">

    <style>
        .column {
            float: left;
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>

    <h3><b>REGISTRAR UN NUEVO ZOMBIE:</b></h3>

    <form class="col s12" action="" method="post">
        <div class="row">
            <div class="">
               <br>
                <label><b>Introduce el nombre del zombie:</b></label>
                <br>
                <input name="nombre" placeholder="Ejemplo: Maria Lopez" />
            </div>
        </div>
        <br>
        <input type="submit" value="Registrar">
    </form>

    <?php
    if($_POST){
     $conexion_bd = conectar();
        
        $nombre=$_POST['nombre'];
        
        $Registrarzom = "CALL regisombie('$nombre')";
        
        var_dump($Registrarzom);
        $ejecutarRegistro = mysqli_query($conexion_bd,$Registrarzom);
        
        desconectar($conexion_bd);
        
        echo "<script>alert('Zombie registrado exitosamente!');</script>";
        
    }
    
    ?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>
