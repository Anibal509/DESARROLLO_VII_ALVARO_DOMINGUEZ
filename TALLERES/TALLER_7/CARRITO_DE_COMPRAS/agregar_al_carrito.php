<?php
    
//En este archivo se hace lo siguiente :
//Tomará el ID del producto enviado desde productos.php.
//Lo guardará en la sesión ($_SESSION['carrito']). y luego 
//Redirigirá de nuevo a productos.php.

require 'config_sesion.php';

//esto verifica si se recibio el id del producto

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);//esto convierte a numero entero x seguridad. y limpia el valor recibido para evitar inyecciones .

//se inicializa el carrito si no existe 
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito']=[];
}

//si el producto ya existe en el carrito ,aumentamos la cantidad asi:

    if (isset($_SESSION['carrito'][$id])){
        $_SESSION['carrito'][$id]['cantidad']++;
    }else {
        //mostramos -->lista de productos
        $productos =[
             1 => ['nombre' => 'Mouse', 'precio' => 15.50],
            2 => ['nombre' => 'Teclado', 'precio' => 25.00],
            3 => ['nombre' => 'Monitor', 'precio' => 150.00],
            4 => ['nombre' => 'USB 16GB', 'precio' => 8.00],
            5 => ['nombre' => 'Auriculares', 'precio' => 30.00],
        ];

       //se verifica si el producto existe 
       if (isset($productos[$id])) {
        $_SESSION['carrito'][$id]=[
            'nombre'=>$productos[$id]['nombre'],
            'precio'=>$productos[$id]['precio'],
            'cantidad'=>1
        ];
       } 
    }
}
//redirijimos a el archivo productos.php
header("Location: productos.php");
exit;
?>