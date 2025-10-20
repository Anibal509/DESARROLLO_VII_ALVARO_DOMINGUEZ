<?php
require 'config_sesion.php'    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver carrito</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php
    if (!isset($_SESSION['carrito']) || empty($_SESSION ['carrito'])) {
        echo "<p> Tu carrito esta vacio</p>";
    }else {
        $total=0;
        echo"<table border='1' cellpadding='8'>";
        echo"<tr><th>Producto</th>
             <th>Precio</th>
             <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acción</th></tr>";
        foreach ($_SESSION['carrito'] as $id => $item) {
            $subtotal = $item['precio']* $item['cantidad'];
            $total +=$subtotal;

            echo "<tr>";
            echo"<td>". limpiar($item['nombre'])."</td>";
            echo"<td>$".number_format($item['precio'],2). "</td>";
            echo"<td>$".$item['cantidad']."</td>";
            echo "<td><a href='eliminar_del_carrito.php?id=$id'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<h3>Total: $".number_format($total, 2). "</h3>";
        echo "<p><a href='checkout.php'>Finalizar compra</a></p>";
    }
    ?>
    <p><a href="productos.php">Seguir comprando</a></p>
</body>    
</html>