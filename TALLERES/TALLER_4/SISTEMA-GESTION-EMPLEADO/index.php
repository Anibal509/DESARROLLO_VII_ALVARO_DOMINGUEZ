<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

$empresa = new Empresa();

// crear ampleados 

$gerente1 = new Gerente("Alma Ruiz", 101 ,3500,"ventas");
$gerente1->setBono(1200);

$gerente2 = new Gerente("Carlos Pérez", 102, 3700, "marketing");
$gerente2->setBono(1500);

$gerente3 = new Gerente("Lucía Gómez", 103, 3600, "recursos humanos");
$gerente3->setBono(1100);

$dev1 = new Desarrollador("Miguel Torres", 201, 2500, "PHP","Junior");
$dev2 = new Desarrollador("Sofía Ramírez", 202, 2600, "JavaScript", "Senior");

//agregamos  a la empresa 
$empresa->agregarEmpleado($gerente1);
$empresa->agregarEmpleado($gerente2);
$empresa->agregarEmpleado($gerente3);
$empresa->agregarEmpleado($dev1);
$empresa->agregarEmpleado($dev2);

echo "Lista de empleados: "."<br>";// listar rmpleados 
$empresa->listarEmpleados();
echo "<br>";

echo "Nomina total: $". $empresa->calcularNominaTotal()."<br>";//Calculo nomina total

echo "Evaluacion de Desempeño:"."<br>";// Evaluacion de desempeño
$empresa->evaluarDesempeno();

?>