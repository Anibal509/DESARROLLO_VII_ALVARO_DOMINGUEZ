<?php
//1.Crear un arreglo de estudiantes con sus calificaciones.
$estudiantes =[
    ["nombre"=> "Ana", "calificaciones"=> [56,67,78,89,89]],
    ["nombre"=> "Juan", "calificaciones"=> [70, 80, 90, 85, 88]],
    ["nombre"=> "Maria", "calificaciones"=> [95, 90, 90, 95, 90]],
    ["nombre"=> "Pedro", "calificaciones"=> [60, 70, 80, 90, 85]],
    ["nombre"=> "Laura", "calificaciones"=> [68, 78, 88, 98, 92]]
];
//2.Funcion para calcular promedio de calificaciones.
function calcularPromedio($calificaciones){
    return array_sum($calificaciones)/count($calificaciones);
}
//3.Funcion para signar una letra de calificaciones basada en el promedio.

function asignarCalificacion($promedio){
    if($promedio >= 90) return 'A';
    if($promedio >= 80) return 'B';
    if($promedio >= 70) return 'C';
    if($promedio >= 60) return 'D';
     return 'F';
}
//4. Procesar y mostrar Informacion de los estudiantes 
echo "<br>","Informacion de los estudiantes:",'<br>';
foreach ($estudiantes as &$estudiante) {
    $promedio= calcularPromedio($estudiante["calificaciones"]);
    $estudiante["promedio"] = $promedio;
    $estudiante["letra_calificacion"]= asignarCalificacion("$promedio");

    echo "{$estudiante['nombre']}:","<br>";
    echo "Calificaciones: " . implode(", ", $estudiante["calificaciones"]) . "<br>";
    echo "Promedio:" .number_format ($promedio, 2)."<br>";
    echo "Calificación: {$estudiante['letra_calificacion']}<br><br>";
}
//5.Encontrar al estudiante con el promedio mas alto.

$mejorEstudiante = array_reduce($estudiantes, function($mejor,$actual){
    return(!$mejor || $actual["promedio"]> $mejor["promedio"])? $actual : $mejor;
});
echo "Estudiante con el promedio mas alto:{$mejorEstudiante['nombre']}({$mejorEstudiante['promedio']}) ","<br>";

//6.Calcular y mostarr el promedio general de la clase 
$promedioGeneral= array_sum(array_column($estudiantes, "promedio")) / count($estudiantes);
echo "Promedio general de la clase: ".number_format($promedioGeneral, 2). "<br>";

//7.Contar estudiantes por letra de calificacion 

$conteoCalificaciones = array_count_values(array_column($estudiantes, "letra_calificacion"));
echo "Distribucion de calificaciones: ","<br>";
foreach ($conteoCalificaciones as $leter => $cantidad) {
    echo "$leter: $cantidad estudiante(s)","<br>";
}
//TAREA:Implementa una funcion que identifique a los estudiantes que necesitan tutoria.
//(Aquellos con un promedio menor a 75 ) y otra que liste a los estudiantes de honor
//(aquellos con un promedio de 90 o mas )

function estudiantesPromedioBajo($estudiantes){
    $resultado =[];
    foreach ($estudiantes as $estudiante) {
        if ($estudiante['promedio']<75) {
            $resultado[] = $estudiante['nombre'];
        }
    }
    return $resultado;
}

function estudiantesPromedioDestacados($estudiantes){
    $resultado =[];
    foreach ($estudiantes as $estudiante) {
        if($estudiante['promedio']>=90){
            $resultado[]=$estudiante['nombre'];
        }
    }
    return $resultado;
}

$tutorias = estudiantesPromedioBajo($estudiantes);
echo "Estudiantes que necesitan tutorias :".(empty($tutorias)? "Ninguno": implode(",",$tutorias))."<br>";

$destacados= estudiantesPromedioDestacados($estudiantes);
echo "Estudiantes destacados: ".(empty($destacados) ? "Ninguno" : implode(", ", $destacados)) . "<br>";
?>