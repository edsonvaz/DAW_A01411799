<?php
include("conexion_presupuestodental.php");
    echo select_doctor("doctor","empleado");
    echo "<br>";
    echo select_paciente("paciente","paciente");
    echo "<br>";
?>

<form method="POST"> 
        <input type="text" class="login-input" name="diagnostico" placeholder="Diagnostico"/>
        <input type="datetime" class="login-input" name="fechaEmision" placeholder="Fecha de hoy" />
        <input type="submit" name="submit" value="Generar" class="login-button">

</form>

<?php
    echo conectar();
    if(isset($_POST['submit']) && isset($_POST["doctor"]) && isset($_POST["paciente"])){
        $diagnostico = $_POST["diagnostico"];
        $fechaEmision = $_POST["fechaEmision"];
        
        presupuesto($_POST["doctor"],$_POST["paciente"],$diagnostico,$fechaEmision);
    }
?>
    