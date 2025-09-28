<?php
//1.Crear un string  JSON con datos de una tienda en linia.

$jsonDatos ='{
"tienda":"ElectroTech",
"productos":[
{"id": 1, "nombre": "Laptop Gamer", "precio": 1200, "categorias": ["electrónica", "computadoras"]},
{"id": 2, "nombre": "Smartphone 5G", "precio": 800, "categorias": ["electrónica", "móviles"]},
{"id": 3, "nombre": "Auriculares Bluetooth", "precio": 150, "categorias": ["electrónica", "audio"]},
{"id": 4, "nombre": "Smart TV 4K", "precio": 950, "categorias": ["electrónica", "televisores"]},
{"id": 5, "nombre": "Tablet", "precio": 400, "categorias": ["electrónica", "móviles"]}

],
"clientes":[
{"id": 101, "nombre": "Ana López", "email": "ana@example.com"},
{"id": 102, "nombre": "Carlos Gomez", "email": "carlos@example.com"},
{"id": 103, "nombre": "Maria Rodriguez", "email": "maria@example.com"}

]
}'
;
//2.Convertir el JSON a un arreglo asociativo de PHP
$tiendaData= json_decode($jsonDatos, true);

//3.Funcion para imprimir los productos 
function imprimirProductos($productos){
    foreach ($productos as $producto) {
        echo "{$producto['nombre']} - $ {$producto['precio']} - Categorias: " .implode(",",$producto['categorias']) . "<br>";
    }
}
echo "Productos de {$tiendaData['tienda']}:","<br>";
imprimirProductos($tiendaData['productos']);

//4.calcular el valor total del inventario .

$valorTotal = array_reduce($tiendaData['productos'], function($total , $producto){
    return $total + $producto['precio'];
}, 0);
echo "<br>", "Valor total del inventario: $$valorTotal","<br>";

//5.Encontrar el producto mas caro.
$productoMasCaro = array_reduce($tiendaData['productos'], function($max, $producto){
    return ($producto['precio'] > $max['precio']) ? $producto : $max;
}, $tiendaData['productos'][0]);
echo "<br>","Producto mas caro: {$productoMasCaro['nombre']} ($ {$productoMasCaro['precio']})","<br>";

//6.Filtrar productos por categoria
function filtrarPorCategoria($productos, $categoria){
    return array_filter($productos, function($producto) use ($categoria){
        return in_array($categoria, $producto['categorias']);
    });
}
$productosDeComputadoras = filtrarPorCategoria($tiendaData['productos'], "computadoras");
echo "<br>", "Productos en la categoria 'computadoras': ","<br>";
imprimirProductos($productosDeComputadoras);

//7.Agregar un nuevo producto
$nuevoProducto = [
    "id"=> 6,
    "nombre"=> "Smartwatch",
    "precio"=> 250,
    "categorias"=> ["electrónica","accesorios","wearables"]
];
$tiendaData['productos'][]= $nuevoProducto;

//8.Convertir el arreglo actualizado de vuelta a JSON

//8.Convertir el arreglo actualizado de vuelta a JSON
$jsonActualizado = json_encode($tiendaData, JSON_PRETTY_PRINT);
echo "<br>","Datos actualizados de la tienda (JSON):","<br>$jsonActualizado,<br>";

// TAREA: Implementa una función que genere un resumen de ventas
// Crea un arreglo de ventas (producto_id, cliente_id, cantidad, fecha)
// y genera un informe que muestre:
// - Total de ventas
// - Producto más vendido
// - Cliente que más ha comprado
// Tu código aquí

//  se Crear un arreglo de ventas (producto_id, cliente_id, cantidad, fecha)
$ventas = [
    ["producto_id" => 1, "cliente_id" => 101, "cantidad" => 3, "fecha" => "2025-09-01"],
    ["producto_id" => 2, "cliente_id" => 102, "cantidad" => 5, "fecha" => "2025-09-02"],
    ["producto_id" => 1, "cliente_id" => 103, "cantidad" => 2, "fecha" => "2025-09-03"],
    ["producto_id" => 3, "cliente_id" => 101, "cantidad" => 4, "fecha" => "2025-09-04"],
    ["producto_id" => 2, "cliente_id" => 102, "cantidad" => 1, "fecha" => "2025-09-05"],
    ["producto_id" => 1, "cliente_id" => 101, "cantidad" => 6, "fecha" => "2025-09-06"]
];

// Función para generar resumen de ventas
function generarResumenVentas($ventas, $tiendaData) {
    $totalVentas = 0;
    $productosContador = [];
    $clientesContador = [];

    foreach ($ventas as $v) {
        $totalVentas += $v["cantidad"];

        // Contar por producto
        if (!isset($productosContador[$v["producto_id"]])) {
            $productosContador[$v["producto_id"]] = 0;
        }
        $productosContador[$v["producto_id"]] += $v["cantidad"];

        // Contar por cliente
        if (!isset($clientesContador[$v["cliente_id"]])) {
            $clientesContador[$v["cliente_id"]] = 0;
        }
        $clientesContador[$v["cliente_id"]] += $v["cantidad"];
    }

    // Producto más vendido
    $idProductoMasVendido = array_keys($productosContador, max($productosContador))[0];
    $productoMasVendidoNombre = "";
    foreach ($tiendaData['productos'] as $producto) {
        if ($producto['id'] == $idProductoMasVendido) {
            $productoMasVendidoNombre = $producto['nombre'];
            break;
        }
    }

    // Cliente que más compró
    $idClienteMasComprador = array_keys($clientesContador, max($clientesContador))[0];
    $clienteMasCompradorNombre = "";
    foreach ($tiendaData['clientes'] as $cliente) {
        if ($cliente['id'] == $idClienteMasComprador) {
            $clienteMasCompradorNombre = $cliente['nombre'];
            break;
        }
    }

    return [
        "totalVentas" => $totalVentas,
        "productoMasVendido" => "$productoMasVendidoNombre ({$productosContador[$idProductoMasVendido]} unidades)",
        "clienteMasComprador" => "$clienteMasCompradorNombre ({$clientesContador[$idClienteMasComprador]} unidades)"
    ];
}

//  Ejecutar y mostrar resumen
$resumen = generarResumenVentas($ventas, $tiendaData);
echo "<br><b>Resumen de Ventas:</b><br>";
echo "Total de ventas: {$resumen['totalVentas']}<br>";
echo "Producto más vendido: {$resumen['productoMasVendido']}<br>";
echo "Cliente que más compró: {$resumen['clienteMasComprador']}<br>";


?>