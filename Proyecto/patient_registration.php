<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    //include("_sidenav.html");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $idPaciente = stripslashes($_REQUEST['idPaciente']);
        $idPaciente = mysqli_real_escape_string($con, $idPaciente);
        $nombre = stripslashes($_REQUEST['nombre']);
        //escapes special characters in a string
        $nombre = mysqli_real_escape_string($con, $nombre);
        $telefono    = stripslashes($_REQUEST['telefono']);
        $telefono    = mysqli_real_escape_string($con, $telefono);
        $rfc = stripslashes($_REQUEST['RFC']);
        $rfc = mysqli_real_escape_string($con, $rfc);
        $fechaNacimiento = stripslashes($_REQUEST['fechaNacimiento']);
        $fechaNacimiento = mysqli_real_escape_string($con, $fechaNacimiento);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $direccion = stripslashes($_REQUEST['direccion']);
        $direccion = mysqli_real_escape_string($con, $direccion);
        $razonSocial = stripslashes($_REQUEST['razonSocial']);
        $razonSocial = mysqli_real_escape_string($con, $razonSocial);
        $codigoPostal = stripslashes($_REQUEST['codigoPostal']);
        $codigoPostal = mysqli_real_escape_string($con, $codigoPostal);
        $query    = "INSERT INTO Pacientes (idPaciente, nombre, telefono, RFC, fechaNacimiento, email, direccion, razonSocial, codigoPostal)
                     VALUES ( '$idPaciente','$nombre', '$telefono', s'$RFC','$fechaNacimiento', '$email', '$direccion', '$razonSocial', '$codigoPostal')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='patient_registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form  class="form" action="" method="post">
        <h1 class="login-title">Registrar Paciente</h1>
       <input type="text" class="login-input" name="idPaciente" placeholder="ID PACIENTE" />
        <input type="text" class="login-input" name="nombre" placeholder="Nombre completo del paciente" />
        <input type="text" class="login-input" name="telefono" placeholder="Telefono" />
        <input type="text" class="login-input" name="rfc" placeholder="RFC" />
        <input type="date" class="login-input" name="fechaNacimiento" placeholder="Fecha de nacimiento" />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="text" class="login-input" name="direccion" placeholder="Direccion" />
        <input type="text" class="login-input" name="razonsocial" placeholder="Razon Social">
        <input type="text" class="login-input" name="codigoPostal" placeholder="Codigo Postal">
        <br>
        <hr>
        <br>
<!--
        <input type="text" class="login-input" name="rfc" placeholder="Motivo primera visita" required />
        <input id="type" class="login-input" list="list2" name="ecronica" placeholder="Tiene el paciente alguna enfermedad cronica?">
            <datalist id="list2">
            <option value="No">
            <option value="Cardiaca">
            <option value="Pulmonar">
            <option value="Renal">
            <option value="Diabetes">
            </datalist>
        <input type="text"  class="observaciones" placeholder="Observaciones" rquired />
-->
        <input type="submit" name="submit" value="Registrar" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
