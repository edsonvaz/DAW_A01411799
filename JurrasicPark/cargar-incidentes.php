<?php
        include("conexionbd.php");

        $conexion_bd = conectar();
            
        $newincident=$_POST['$incidentNewCount'];

        $sql= "SELECT ubicacion,incidente,ReportadoEn as fecha FROM incidente LIMIT $newincident ";
        $result= mysqli_query($conexion_bd,$sql);
        
        $resultado = '<table class="table" style="text-align: center" id="oopsies">';
        $resultado .= '<thead class="red darken"><tr><th style="color:black">UBICACIÓN</th><th style="color:black">INCIDENTE</th><th style="color:black">FECHA</th><tr></thead>';
        
        if (mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)){
                
            $resultado .= '<tr>';
            $resultado .= '<td>'.$row["ubicacion"].'</td>';
            $resultado .= '<td>'.$row["incidente"].'</td>';
            $resultado .= '<td>'.$row["fecha"].'</td>';
            $resultado .= '</tr>';
                
            }
            
        }else{
            echo "No hay mas incidentes registradas!";
        }
        
        desconectar($conexion_bd);
        echo $resultado;
        ?>
