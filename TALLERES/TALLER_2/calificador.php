
<?php
//  Declarar la variable con una calificación
$calificacion = 85; // Puedes cambiar este valor entre 0 y 100

//  Determinar la letra usando if-elseif-else
if ($calificacion >= 90 && $calificacion <= 100) {
    $letra = "A";
} elseif ($calificacion >= 80 && $calificacion <= 89) {
    $letra = "B";
} elseif ($calificacion >= 70 && $calificacion <= 79) {
    $letra = "C";
} elseif ($calificacion >= 60 && $calificacion <= 69) {
    $letra = "D";
} else {
    $letra = "F";
}

//  Imprimir  con operador ternario
$estado = ($calificacion >= 60) ? "Aprobado" : "Reprobado";
echo "Tu calificación es $letra. $estado.<br>";

//  Mensaje adicional usando switch
switch ($letra) {
    case "A":
        echo "Excelente trabajo";
        break;
    case "B":
        echo "Buen trabajo";
        break;
    case "C":
        echo "Trabajo aceptable";
        break;
    case "D":
        echo "Necesitas mejorar";
        break;
    case "F":
        echo "Debes esforzarte más";
        break;
    default:
        echo "Calificación inválida";
}
?>



