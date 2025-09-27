<?php
 //1.Crear un arreglo asociativo de productos con su inventario .
$inventario = [
    "laptop" => ["cantidad" => 90, "precio" => 800],
    "smartphone" => ["cantidad" => 150, "precio" => 500],
    "tablet" => ["cantidad" => 60, "precio" => 300],
    "smartwatch" => ["cantidad" => 40, "precio" => 200],
];
// 2. funcion mostrar inventario .
function mostrarInventario($inv){
    foreach ($inv as $producto => $informacion) {
        echo "$producto: {$informacion['cantidad']} unidades, Precio:$ {$informacion['precio']}","<br>";
}
}
//3.Mostrar inventario Inicial 
echo "Inventario Inicial:","<br>";
mostrarInventario($inventario);

//Funcion para actualizar inventario 
function actualizarInventario(&$inv,$producto,$cantidad,$precio=null){
    if (!isset($inv[$producto])) {
        $inv[$producto]=["cantidad"=>$cantidad,"precio"=>$precio];
    }else {
        $inv[$producto]["cantidad"]+=$cantidad;
        if ($precio!==null) {
            $inv[$producto]["precio"]=$precio;
        }
    }
}
//5.Actualizar inventario 
actualizarInventario($inventario, "laptop", -10);// se vendieron 10 laptop.
actualizarInventario($inventario,"smartphone", 30,450);//new lote con precio actu....
actualizarInventario($inventario, "auriculares",100,50);//new producto agregado.

//6.mostarmos  inventario actualizado 

echo "<br>","Inventario Actualizado:","<br>";
mostrarInventario($inventario);

//7.Funcio para calcular el valor total del inventaro 
function valorTotalInventario($inv){
    $total = 0;
    foreach ($inv as $producto => $informacion) {
        $total +=$informacion['cantidad']*$informacion['precio'];
    }return $total;
}
//8.Mostrat valor total del inventario
echo "<br>","El valor total del inventario es:$".valorTotalInventario($inventario)."<br>";

//tarea: Crear una funcio que encuentre y retorne el producto con mayor  valor totoal en el invent...
//(cantidad *precio).muestra el resultado.

function encontrarProductoMayor($inv){
    $mayorValor=0;
    $productoMayor="";
    foreach ($inv as $producto => $informacion) {
        $valorTotal=$informacion['cantidad']*$informacion['precio'];
        if ($valorTotal > $mayorValor) {
            $mayorValor= $valorTotal;
            $productoMayor=$producto;

        }
    }
    return [$productoMayor, $mayorValor];
}
list($producto,$valor)=encontrarProductoMayor($inventario);
echo "El producto con mayor valor en el inventarioes $producto con valor total de:\$$valor ";
?>