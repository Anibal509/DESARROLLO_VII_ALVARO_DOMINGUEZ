<?php

// LIsta de funciones  implementadas 

// 1. Leer inventario desde JSON y convertirlos en un array de productos.
function leerInventario($archivo) {
    $contenido = file_get_contents($archivo);
    $inventario = json_decode($contenido, true);
    return $inventario;
}

// 2.Ordenar inventario alfabéticamente por nombre
function ordenarInventario($inventario) {
    usort($inventario, function($a, $b) {
        return strcmp($a['nombre'], $b['nombre']);
    });
    return $inventario;
}

//3. Resumen del inventario
function mostrarResumenInventario($inventario) {
    echo "Resumen del Inventario:\n";
    echo " \n";
    foreach($inventario as $producto) {
        echo "Producto: {$producto['nombre']}, Precio: \${$producto['precio']}, Cantidad: {$producto['cantidad']}\n";
    }
    echo "\n";
}

// 4.Calcular valor total del inventario
function valorTotalInventario($inventario) {
    return array_sum(array_map(function($p){ return $p['precio']*$p['cantidad']; }, $inventario));
}

// 5.Mostrar productos con stock bajo (<5 unidades)
function productosStockBajo($inventario) {
    $stockBajo = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });

    echo "Productos con Stock Bajo (<5 unidades):\n";
    echo "  \n";
    foreach($stockBajo as $producto) {
        echo "- {$producto['nombre']} (Cantidad: {$producto['cantidad']})\n";
    }
    echo "\n";
}
?>
