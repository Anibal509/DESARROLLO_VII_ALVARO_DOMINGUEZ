<?php
require_once 'config_sesion.php';
//echo "<pre>SESSION ACTUAL:\n";
//print_r($_SESSION);
//echo "</pre>";
// se mostrara un saludo si existe la cookie guardada
if (isset($_COOKIE['usuario'])) {//verifica si existe la cookie
  echo "<p>Bienvenido de nuevo,". htmlspecialchars($_COOKIE['usuario'])."!</p>";
}//evita ataques XSS

//Listas de productos 
$productos=[
  1 =>["nombre" =>"Mouse-inalambrico", "precio"=>15.50],
  2 =>["nombre" =>"Teclado", "precio"=>25.50],
  3 =>["nombre" =>"Monitor", "precio" =>135.00],
  4 =>["nombre" =>"USB-20GB", "precio" => 15.00],
  5 =>["nombre" =>"Audifonos-bluetooth","precio" =>30.00],
];

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Productos</title>
</head>
<body>
  <h2>Lista de Productos</h2>
  <ul>
  <?php foreach ($productos as $id => $prod): ?>
    <li>
      <?= limpiar($prod['nombre']) ?> -$<?= $prod['precio']?><!--imprime nombre del producto de forma segura + el precio listo para mostrar-->
      <a href="agregar_al_carrito.php?id=<?= $id?>">Añadir al carrito</a>
    </li>
  <?php endforeach; ?>
  </ul>
  <br>
  <a href="ver_carrito.php">Ver carrito</a>
</body>
</html>

