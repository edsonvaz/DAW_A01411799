<?php 
    require("conexion_bd.php");
     ?>

<form method="POST">
    
    <ul style="color:darkgrey;" >
        <a href="dashboard.php" style="color:blue">Inicio</a>  
        / <a style="color:slategray" href="pacientes.php">Pacientes</a>
    </ul>
    <h1 class="login-title">Registrar Paciente</h1>
    <br>

        <label style="color:gray">Campos obligatorios*</label>
    <br>
    <br>
        <input type="text" class="login-input" name="nombre" placeholder="Nombre completo del paciente*" required >
        <input type="radio" name="sexo" value="1"> 
        <label for="1" style="color:gray">Hombre</label>
        <input type="radio" name="sexo" value="0"> 
        <label for="0" style="color:gray">Mujer</label>
    <br>
    <br>
        <input type="text" class="login-input" name="telefono" placeholder="Telefono*" required>
        <input type="text" class="login-input" name="rfc" placeholder="RFC*" required>
        <input type="datetime" class="login-input" name="fechaNacimiento" placeholder="Fecha de nacimiento(aaaa-mm-dd)*" required>
        <input type="text" class="login-input" name="email" placeholder="Correo electrónico*"required>
        <input type="text" class="login-input" name="emailFacturas" placeholder="Correo electrónico Facturas">
        <input type="text" class="login-input" name="razonsocial" placeholder="Razon Social">
        <input type="text" class="login-input" name="direccion" placeholder="Direccion*" required>
        <input type="text" class="login-input" name="codigoPostal" placeholder="Codigo Postal*" required>
        <br>
        <hr>
        <br>
        <input type="submit" name="submit" value="Registrar" class="login-button">

    </form>
</body>

    <?php
    if(isset($_POST['submit'])){
        $id = rand(20000,29999);
        $sexo = $_POST["sexo"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $rfc = $_POST["rfc"];
        $email = $_POST["email"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $emailFacturas = $_POST["emailFactura"];
        $razonsocial =$_POST["razonsocial"];
        $direccion = $_POST["direccion"];
        $codigoPostal = $_POST["codigoPostal"];
        
        $insertarPaciente = "INSERT INTO Paciente (idPaciente, sexo, nombre, fechanacimiento, telefono, rfc, email, emailFacturas, razonsocial, direccion, codigopostal) 
        VALUES ($id, $sexo,'".$nombre."', '".$fechaNacimiento."', ".$telefono.", '".$rfc."', '".$email."', '".$emailFacturas."', '".$razonsocial."', '".$direccion."', $codigoPostal)";
        
        var_dump($insertarPaciente);
        $ejecutarInsertar = mysqli_query($conexion_bd,$insertarPaciente);
        
        
        if (!$ejecutarInsertar){
            echo "Error en consulta sql.";
            $insertarPaciente -> error;
        }else{
            ?>
        <script type=text/javascript>
                
        alert('Registro completado');
        </script><?php
        }
        
    }
    
    ?>





