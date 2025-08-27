<?php
echo "<h2>Generador de Patrones</h2>";

echo "<h3>tringulo rectangulo con for </h3>";

for($i =1; $i <=5; $i++){

    for($j= 1; $j<= $i; $j++){

        echo"*";
    }
    echo "<br>";
}

    echo "<h3>Secuencia de numeros con bucle while </h3>";

    $num =1;
    while($num <=20){
        if($num % 2 !=0){
            echo $num ."";
        }
        $num++;
    }
    echo "<br>";

    echo "<h3>Contador regresivo con bucle do_while </h3>";
    $contador =10;
    do{
        if($contador == 5){
            $contador--;
            continue;
        }
        echo $contador ."";
        $contador--;
    }while ($contador >= 1);



?>