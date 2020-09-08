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
    echo "Resultado: El promedio es $media";
}

echo "<br>";
promedio();
echo "<br>";
echo "<br>";


echo "<h1><b>FUNCION 2:</b> MEDIANA A PARTIR DE UN ARRAY</h1>";
echo "<br>";

$mediana=0;
    
function mediana($nums = [6,3,1,2,5,4,7]){
    sort($nums);
    $mediana= $nums[sizeof($nums)/2];
    echo "Resultado: La mediana es es $mediana";
  }

mediana();
echo "<br>";

?>

        </div>
    </div>

</body>

</html>
