<?php 
    $host="localhost";
    $name="fer";
    $pass="micontra";
    $dbname="RPacientes";
    
    
        $conexion_bd = mysqli_connect($host,$name,$pass,$dbname);
    
    if (!$conexion_bd){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } ?>

<form method="POST">
    
    <ul style="color:darkgrey;" >
        <a href="dashboard.php" style="color:blue">Inicio</a>  
        / <a style="color:slategray" href="pacientes.php">Pacientes</a>
    </ul>
    <h1 class="login-title">Registrar Paciente</h1>
    <br>

    
        <input type="text" class="login-input" name="nombre" placeholder="Nombre completo del paciente" />
        <input type="text" class="login-input" name="telefono" placeholder="Telefono" />
        <input type="text" class="login-input" name="rfc" placeholder="RFC" />
        <input type="datetime" class="login-input" name="fechaNacimiento" placeholder="Fecha de nacimiento" />
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="text" class="login-input" name="emailFacturas" placeholder="Email Facturas">
        <input type="text" class="login-input" name="razonsocial" placeholder="Razon Social">
        <input type="text" class="login-input" name="direccion" placeholder="Direccion" />
        <input type="text" class="login-input" name="codigoPostal" placeholder="Codigo Postal">
        <br>
        <hr>
        <br>
        <input type="submit" name="submit" value="Registrar" class="login-button">

    </form>

    <?php
    if(isset($_POST['submit'])){
        $id =rand(20007,29999);
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $rfc = $_POST["rfc"];
        $email = $_POST["email"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $emailFacturas = $_POST["emailFactura"];
        $razonsocial =$_POST["razonsocial"];
        $direccion = $_POST["direccion"];
        $codigoPostal = $_POST["codigoPostal"];
        
        $insertarPaciente = "INSERT INTO Paciente (idPaciente, nombre, fechanacimiento, telefono, rfc, email, emailFacturas, razonsocial, direccion, codigopostal) 
        VALUES ($id, '".$nombre."', '".$fechaNacimiento."', ".$telefono.", '".$rfc."', '".$email."', '".$emailFacturas."', '".$razonsocial."', '".$direccion."', $codigoPostal)";
        
        var_dump($insertarPaciente);
        $ejecutarInsertar = mysqli_query($conexion_bd,$insertarPaciente);
        
        
        if (!$ejecutarInsertar){
            echo "Error en consulta sql.";
            $insertarPaciente -> error;
        }
        
    }
    
    ?>





