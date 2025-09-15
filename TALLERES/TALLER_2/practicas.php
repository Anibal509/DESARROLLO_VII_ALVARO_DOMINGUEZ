<?php
// serie fib....>

$n = 10; //muestra la cantidad de numeros que se mostrara

$primer = 0;
$segundo = 1;

echo "Serie Fibonacci ($n términos): <br>";

for ($i = 1; $i <= $n; $i++) {
    if (isset($primer) && isset($segundo)) {
        echo $primer . " ";
        $siguiente = $primer + $segundo;
        $primer = $segundo;
        $segundo = $siguiente;
    }
  
}

//Calificaiones de studiantes 

$estudiantes = [
    "Ana" => 85,
    "Luis" => 92,
    "Carlos" => 68,
    "Marta" => 74,
    "Sofia" => 59
];

// Recorremos el array
foreach ($estudiantes as $nombre => $nota) {
    if (isset($nombre) && isset($nota)) {
        echo $nombre . ": " . $nota . " - ";
        
        if ($nota >= 90) {
            echo "A<br>";
        } elseif ($nota >= 80) {
            echo "B<br>";
        } elseif ($nota >= 70) {
            echo "C<br>";
        } elseif ($nota >= 60) {
            echo "D<br>";
        } else {
            echo "F<br>";
        }
    }
}

// con aproba /desaprobado

$estudiantes = [
    "Ana" => 85,
    "Luis" => 55,
    "Carlos" => 68,
    "Marta" => 74,
    "Sofia" => 59
];

foreach ($estudiantes as $nombre => $nota) {
    if (isset($nombre) && isset($nota)) {
        echo $nombre . ": " . $nota . " - ";

        if ($nota >= 60) {          //+ 60 aprobado
            echo "Aprobado<br>";
        } else {                     // - 60 es desaprobado
            echo "Desaprobado<br>";
        }
    }
}

// con fucncion Y  estado
function calificacion($nota) {
    if (isset($nota)) {
        if ($nota >= 90) {
            return "A - Aprobado";
        } elseif ($nota >= 80) {
            return "B - Aprobado";
        } elseif ($nota >= 70) {
            return "C - Aprobado";
        } elseif ($nota >= 60) {
            return "D - Aprobado";
        } else {
            return "F - Desaprobado";
        }
    } else {
        return "Nota no definida";
    }
}

// Array de estudiantes
$estudiantes = [
    "Ana" => 85,
    "Luis" => 55,
    "Carlos" => 68,
    "Marta" => 74,
    "Sofia" => 59
];

// Recorremos y mostramos
foreach ($estudiantes as $nombre => $nota) {
    if (isset($nombre) && isset($nota)) {
        echo $nombre . ": " . $nota . " - " . calificacion($nota) . "<br>";
    }
}

// Función que devuelve los n primeros términos de Fibonacci
function fibonacci($n) {
    if (!isset($n) || $n <= 0) {
        return "Número no válido";
    }

    $primer = 0;
    $segundo = 1;
    $resultado = "";

    for ($i = 1; $i <= $n; $i++) {
        if (isset($primer) && isset($segundo)) {
            $resultado .= $primer . " "; // Concatenamos los números en una cadena
            $siguiente = $primer + $segundo;
            $primer = $segundo;
            $segundo = $siguiente;
        }
    }

    return $resultado;
}

// Usamos la función
$n = 10;
echo "Serie Fibonacci ($n términos): " . fibonacci($n);

?>


