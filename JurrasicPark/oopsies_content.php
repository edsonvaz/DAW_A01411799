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

    <h3><b>REPORTAR UN INCIDENTE:</b></h3>

    <div class="row">
        <div class="column">

            <?php
        echo select_incidente_ubicacion("ubicacion","lugar");
        ?>

        </div>
        <div class="column">

            <?php
        echo select_incidente_ubicacion("oopsie","tipoincidente");
        ?>

        </div>
    </div>

    <form class="col s12" action="" method="post">
        <div class="row">
            <div class="column">
                <label for="last_name"><b>Introduce la ubicación:</b></label>
                <br>
                <input name="ubicacion" placeholder="Ejemplo: Restaurante" />
            </div>
            <div class="column">
                <label for="last_name"><b>Introduce el tipo de incidente:</b></label>
                <br>
                <input name="oopsie" placeholder="Ejemplo: Fuga de TRex" />
            </div>
        </div>
        <input type="submit" value="Reportar">
    </form>

    <?php
    if($_POST){
     $conexion_bd = conectar();
        
        $ubicacion=$_POST['ubicacion'];
        $oopsie=$_POST['oopsie'];
        
        $insertarReporte = "INSERT INTO incidente(ubicacion, incidente) VALUES('$ubicacion','$oopsie')";
        
        var_dump($insertarReporte);
        $ejecutarInsertar = mysqli_query($conexion_bd,$insertarReporte);
        
    desconectar($conexion_bd);
        
        echo "<script>alert('Reporte generado!');</script>";
        
    }
    
    ?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>
