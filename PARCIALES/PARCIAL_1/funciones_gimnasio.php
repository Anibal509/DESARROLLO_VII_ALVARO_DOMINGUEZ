<?php

function calcular_promocion($antiguedad_meses){
     $descuento=0;

     if ($antiguedad_meses >= 3 && $antiguedad_meses<=12) {
         $descuento =$descuento*0.08;
     }elseif ($antiguedad_meses>= 13 && $antiguedad_meses<= 24) {
        $desuento = $descuento * 0.12;
     }elseif ($antiguedad_meses > 24) {
        $descuento = $descuento *0.20;
     }return $descuento;
}

function calcular_seguro_medico($cuota_base){
    $cargoadicional= $cuota_base*0.05;
}return $cargoadicional;

function calcular_cuota_final($cuota_base,$descuento,$seguro_medico){
    $total=$cuota_base-$descuento+$seguro_medico;
}

    
?>