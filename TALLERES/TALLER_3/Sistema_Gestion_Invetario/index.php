
<?php
// Incluir las funciones
require_once "funciones/inventario.php";

$inventario = leerInventario("datos/inventario.json");

// Ordenar alfabéticamente

$inventarioOrdenado = ordenarInventario($inventario);

//  resumen  inventario
mostrarResumenInventario($inventarioOrdenado);

// Calculo  del  valor total
$total = valorTotalInventario($inventarioOrdenado);
echo "Valor Total del Inventario: \$$total\n\n";

// Mostrar productos con stock mas  bajo

productosStockBajo($inventarioOrdenado);
?>

