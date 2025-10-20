<?php
require 'config_sesion.php';

// si esta vacio el carro , vamos  a productos/

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: productos.php");
    exit;
}

//Inicializamos el total 
$total = 0;

//verificamos si el formulario se envio 
//if (isset($_POST['nombre']) && !empty($_SESSION['carrito'])) {
    $nombre = trim($_POST['nombre']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && !empty(trim($_POST['nombre']))) {

//guardame nombre de ususario por 24 horas 
setcookie('usuario',$nombre,time()+86400,'/','',false,true);

//calculamos el total de la compra.
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad']; // Fixed array access
}
// vaciamos el carrito de compras
$_SESSION['carrito'] = []; // una vez finalizado la compra. evita q quede algo en el carro despues de la copra
$mensaje = "Gracias, " . htmlspecialchars($nombre) . "! Su compra por $" . number_format($total, 2) . " se ha completado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!--<link rel="stylesheet" >-->
</head>
<body>
        <h1>Checkout</h1>
        <?php if (isset($mensaje)): ?>
            <p><?= $mensaje?></p>
            <p><a href="productos.php">Seguir comprando</a></p>
        <?php else: ?>
            <h2>Resumen de la compra</h2>
            <ul>
                <?php foreach ($_SESSION['carrito'] as $item):
                $subtotal = $item['precio']* $item['cantidad'];
                $total += $subtotal; 
            ?>
            <li>
                <?= limpiar($item['nombre'])?> - $<?=number_format($item['precio'], 2)?> x <?=$item['cantidad'] ?> = $<?=number_format($subtotal, 2)?> 

            </li>        
                
        <?php endforeach;?> 
    </ul>
    <h3>Total: $<?= number_format($total, 2)?></h3>

    <form method="post" action="">
        <label>Tu nombre:
            <input type="text" name="nombre" required></label>
        <button type="submit">Finalizar compra</button>
    </form>
    <p><a href="ver_carrito.php">Volver al carrito</a></p>
    <?php endif; ?>
</body>
</html>