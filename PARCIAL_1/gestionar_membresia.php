<?php

 $Membresias=[
    "Basico"=>85,
   "premium" => 140,
   "vip" => 200,
   "familiar" =>250,
   "empresarial"=> 300,
 ];
    
 $miembros=[
    "Carla Perez" => ["tipo"=> "premiun", "antiguedad"=> 20 ],
    "Juan Garcia" => ["tipo"=> "premiun", "antiguedad"=> 3],
    "Ana Lopez" => ["tipo"=> "premiun", "antiguedad"=> 50 ],
    "Sofia Hurtado" => ["tipo"=> "premiun", "antiguedad"=> 6 ],
    "ALvaro Dominguez" => ["tipo"=> "premiun", "antiguedad"=> 90 ],
    "Maria Alveo" => ["tipo"=> "premiun", "antiguedad"=> 4 ],
    "Ceciclia Rodriguez" => ["tipo"=> "premiun", "antiguedad"=> 12 ],
 ];

$subtotal=0;
 foreach ($miembros as $membresia => $cantidad) {
    if (isset($Membresias[$membresia]) && $cantidad >0) {
        $subtotal=$subtotal+($Membresias[$membresia]);
    }
}

$descuento =calcular_promocion($subtotal);
$impuesto=calcular_seguro_medico($subtotal-$descuento);
$total=calcular_cuota_final($subtotal,$descuento,$impuesto);

?>
<!DOCTYPE html>
<html>
<head>
    <title>MIEMBROS DEL GIM</title>
    <body>
    <table>
        <th> </th>
        <th></th>
        <th></th>
        <th>Total</th>
     
    <?php
    foreach ($miembros as $membresia => $cantidad) {
        if($cantidad >0){
        $precio=$productos[$producto];
        $total_producto= $precio ;
        echo"<tr>";
        echo "<td>$</td>";
        echo "<td>$</td>";
        echo "<td>$</td>";
        echo "<td>$</td>";
        echo "</tr>";

        }
        
    }    
    ?>
    </table>
    <p><strong>Subtotal:</strong></p><?php echo $subtotal?>
    <p><strong>Descuento:</strong></p><?php echo $descuento?>
    <P><strong>Seguro(5%):</strong></P><?php echo $impuesto?>
    <p>Total a pagar:</p><?php echo $total?>
</body>
</html>
