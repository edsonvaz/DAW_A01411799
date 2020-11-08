<html>

<head>
    <title>Presupuesto Dental</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>


<?php
include("_headermenu.html");
include("_sidenav_diagnostico.html");
?>

    <main class="main">
        <nav>
            <ul style="color:darkgrey;">
                <a href="dashboard.php" style="color:blue">Inicio</a>
                / Presupuesto Dental
            </ul>
        </nav>
               
                <h1 class="card-title" style="color: blue">GENERAR PRESUPUESTO DENTAL</h1>
                
        <?php
    include("_insertar_presupuestodental.php");  
        ?>
        
    </main>