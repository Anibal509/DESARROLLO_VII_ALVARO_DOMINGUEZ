<?php
require 'config_sesion.php';

//verificar que se recibio el,id  del producto 
if(isset($_GET['id'])){
    $id = intval($_GET['id']);

 //Si el producto ya existe en el carro lo eliminamos
 if (isset($_SESSION['carrito'][$id])) {// revisa q existe realmente el product. en el array
    unset($_SESSION['carrito'][$id]);//elimina el elemento del array
 }   
}
//Redirigir de nuevo al carrito
header("Location: ver_carrito.php");
exit;
?>