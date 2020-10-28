<?php
include("conexionbd.php");
include("_navbar.html");
include("_header.html");
?>

<head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
    
    $(document).ready(function(){
        var incidentcount=3;
        $("button").click(function(){
            incidentcount+=3;
            $("#incidents").load("cargar-incidentes.php",{
                
                $incidentNewCount: incidentcount
                
            });
            
        });
        
        
    });
        
    </script>

</head>

<body style="background-color: white">
    <div class="row" id="reports">
        <div class="col s12">
            <div class="card black">
                <div class="card-content white-text" style="text-align: center">
                    <p style="color: white">
                        Los reportes se muestran del mas reciente al mas antiguo. Si desea regresar, favor de hacer click en <i>Atención a cliente</i> en el menú de arriba.
                        <br>
                        Para ver registros mas antigüos deberá dar click en el siguiente botón:
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="incidents">
        <?php
        $conexion_bd = conectar();
        $sql= "SELECT ubicacion,incidente,ReportadoEn as fecha FROM incidente LIMIT 3";
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

    </div>

    <div class="card-action" style="text-align: center">
        <button>Ver más</button>
    </div>
    <hr>

</body>
