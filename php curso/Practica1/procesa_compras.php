<?php
 include"funciones_tienda.php";
 
 $productos=[
    "camisa"=>50,
   "pantalon" => 67,
   "zapatos" => 50,
   "medias" =>30,
   "gorra"=> 10,

 ];
    
$carrito=['camisa'=>4,  //simula un carrito
           'pantalon'=>2,
            'zapatos'=>1,
            'medias'=>2,
            'gorra'=>2,
];

//calculamos el subtotal de la compra// llamaomos a las funciones  
$subtotal=0;

foreach ($carrito as $producto => $cantidad) {
    if (isset($productos[$producto]) && $cantidad >0) {
        $subtotal=$subtotal+($productos[$producto]*$cantidad);
    }
}

//esto es descuento y impuesto y total .
$descuento =calcular_descuento($subtotal);
$impuesto=aplicar_impuesto($subtotal-$descuento);
$total=calcular_total($subtotal,$descuento,$impuesto);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Resumen de la Compra</title>
    <body>
    <table>
        <th>Producto </th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
     
    <?php
    foreach ($carrito as $producto => $cantidad) {
        if($cantidad >0){
        $precio=$productos[$producto];
        $total_producto= $precio *$cantidad;
        echo"<tr>";
        echo "<td>$producto</td>";
        echo "<td>$cantidad</td>";
        echo "<td>$precio</td>";
        echo "<td>$total_producto</td>";
        echo "</tr>";

        }
        
    }    
    ?>
    </table>
    <p><strong>Subtotal:</strong></p><?php echo $subtotal?>
    <p><strong>Descuento:</strong></p><?php echo $descuento?>
    <P><strong>Impuesto(7%):</strong></P><?php echo $impuesto?>
    <p>Total a pagar:</p><?php echo $total?>
</body>
</html>
