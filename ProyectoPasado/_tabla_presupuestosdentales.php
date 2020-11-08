<?php
include("_headermenu.html");
include("_sidenav_diagnostico.html");
?>


<html>

<head>
    <title>Presupuesto Dental</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<main class="main">
    <nav>
        <ul style="color:darkgrey;">
            <a href="dashboard.php" style="color:blue">Inicio</a>
            / Presupuesto Dental
        </ul>
    </nav>
    
<?php
    include("conexion_presupuestodental.php");
    echo tabla_presupuestos();
?>
