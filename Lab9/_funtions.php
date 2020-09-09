<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <div class="notification">

            <?php
echo "<h1><b>FUNCION 1:</b> PROMEDIO A PARTIR DE UN ARRAY</h1>";
    
$media=0;
    
function promedio($nums = [4,4,4,4]){
    $media= array_sum($nums)/count($nums);
    return $media;
}

echo "<br>";
echo "Resultado: El promedio es ".promedio();
echo "<br>";
echo "<br>";

$mediana=0;

echo "<h1><b>FUNCION 2:</b> MEDIANA A PARTIR DE UN ARRAY</h1>";
echo "<br>";
            
function mediana($nums = [6,3,1,2,5,2,7]){
    sort($nums);
    $mediana= $nums[sizeof($nums)/2];
    return  $mediana;
  }

echo "Resultado: La mediana es ".mediana();
echo "<br>";

echo "<br>";
            
function lista($nums = [6,3,1,2,5,4,7]){
    echo "<h1><b>FUNCION 3:</b> Promedio, mediana, orden ascendente y descendente.</h1>";
    echo "<br>";
    echo "Promedio= ". promedio($nums)."<br>" ;
    echo "Mediana= " . mediana($nums)."<br><br>";
    $sum=0;
    
    echo "<ul><b>Ascendente</b>";
    for($i = 0; $i < sizeof($nums); $i++){
        $aux = $nums[$i];
        $sum +=$nums[$i];
        echo "<li>" .$nums[$i] ."</li>" ;        
    }
    echo "</ul><br>";
    
    rsort($nums);
    echo "<ul><b>Descendente</b>";
    for($i = 0; $i < sizeof($nums); $i++){
        $aux = $nums[$i];
        echo "<li>" .$nums[$i] ."</li>" ;        
    }
    echo "</ul><br>";
}
            
lista();
            
function tabla($n=4){
echo "<h1><b>FUNCION 4:</b> Tabla de cuadrados y cubos</h1>";
    echo "<table class=\"n-table\">";
    for($i = 1; $i <= $n; $i++){
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . pow($i,2) . "</td>";
        echo "<td>" . pow($i,3) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

tabla();            
            
?>

        </div>
    </div>

</body>

</html>
