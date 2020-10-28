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

    <h3><b>REPORTAR UN ESTADO DE ZOMBIE NUEVO:</b></h3>

    <div class="row">
        <div class="column">

            <?php
        echo select_zombie("zombi","zombie");
        ?>

        </div>
        <div class="column">

        <?php
        echo select_estado("stat","estado");
        ?>

        </div>
    </div>

    <form class="col s12" action="" method="post">
        <div class="row">
            <div class="column">
                <label ><b>Introduce el nombre del zombie seleccionado arriba:</b></label>
                <br>
                <input name="nombre" placeholder="Ejemplo: Maria Felix" />
            </div>
            <div class="column">
                <label ><b>Introduce el tipo de estado seleccionado arriba:</b></label>
                <br>
                <input name="stat" placeholder="Ejemplo: desmayo" />
            </div>
        </div>
        <input type="submit" value="Reportar">
    </form>

    <?php
    if($_POST){
     $conexion_bd = conectar();
        
        $nombre=$_POST['nombre'];
        $stat=$_POST['stat'];
        
        $insertarReporte = "INSERT INTO zombie_estado(name, state) VALUES('$nombre','$stat')";
        
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
