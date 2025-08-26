<?php
//definicion de variables 
$nombre_completo = "Alvaro Dominguez";
$edad = "30";
$correo = "dominguez_alveo20@hotmail.com";
$telefono ="67220210";

//Deficion de constante  
define("OCUPACION","Estudiante");

//Impresion con echo

echo "<p>Mi nombre completo es: " . $nombre_completo . "</p>";

//Impresion con print
print "<p>Tengo " . $edad . " años</p>";

//Impresion con printf
printf("<p>Mi correo electrónico es: %s</p>", $correo);

//Otra forma con concatenacion 
echo "<p>Mi numero de telefono es:" .telefono . "</p>";

//Mostrar constante 
echo "<p> Mi ocupacion actual es : " . OCUPACION . "</p>";

// Línea separadora
echo "<hr>";

// var_dump de cada variable
var_dump($nombre_completo);
echo "<br>";

var_dump($edad);
echo "<br>";

var_dump($correo);
echo "<br>";

var_dump($telefono);
echo "<br>";

var_dump(OCUPACION);

?>