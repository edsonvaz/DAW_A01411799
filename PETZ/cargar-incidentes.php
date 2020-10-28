<?php
        include("conexionbd.php");

        $conexion_bd = conectar();
            
        $newincident=$_POST['$incidentNewCount'];

        $sql= "SELECT z.nombre, e.stat, ze.fecha FROM zombie z, estado e, zombie_estado ze WHERE z.nombre=ze.name AND e.stat=ze.state LIMIT $newincident";
        $result= mysqli_query($conexion_bd,$sql);
        
        $resultado = '<table class="table" style="text-align: center" id="oopsies">';
                $resultado .= '<thead class="red darken"><tr><th style="color:black">NOMBRE</th><th style="color:black">ESTADO</th><th style="color:black">FECHA</th><tr></thead>';
        
        if (mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)){
                
            $resultado .= '<tr>';
            $resultado .= '<td>'.$row["nombre"].'</td>';
            $resultado .= '<td>'.$row["stat"].'</td>';
            $resultado .= '<td>'.$row["fecha"].'</td>';
            $resultado .= '</tr>';
                
            }
        }else{
            echo "No hay registros que mostrar!";
        }
        desconectar($conexion_bd);
        echo $resultado;
        ?>
