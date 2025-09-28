<?php
//Paso 4: Ordenamiento y Filtrado Avanzado de Arreglos
//1.Definir el arreglo de libros

$biblioteca =[
    [
        "titulo"=>"Cien años de soledad",
        "autor"=>"Gabriel Garcia Márquez",
        "año"=>1967,
        "genero"=>"Realismo mágico",
        "prestado"=> true,
    ],
    [
        "titulo"=>"1984",
        "autor"=>"George Orwell",
        "año"=>1949,
        "genero"=>"Ciencia ficcion",
        "prestado"=> false,
    ],
    [
        "titulo"=>"El Principito",
        "autor"=>"Antoine de Saint-Exupéry",
        "año"=>1943,
        "genero"=>"Literatura infantil",
        "prestado"=> true,
    ],
    [
        "titulo"=>"Don Quijote de la Mancha",
        "autor"=>"Miguel de Cervantes",
        "año"=>1605,
        "genero"=>"Novela",
        "prestado"=> false,
    ],
    [
         "titulo"=>"Orgullo y prejuicio",
        "autor"=>"Jane Austen",
        "año"=>1813,
        "genero"=>"Novela romántica",
        "prestado"=> true,
    ]
];

//2.Funcion para imprimir la biblioteca
function imprimirBiblioteca($libros){
    foreach ($libros as $libro) {
        echo "{$libro['titulo']} - {$libro['autor']} ({$libro['año']}) - {$libro['genero']} - " .($libro['prestado'] ? "Prestado" : "Disponible"). "<br>";
    }
    echo "<br>";
}
echo "<br> Biblioteca Original:<br>";
 imprimirBiblioteca($biblioteca);

 //3.Ordenar libros por años de publicación (del +antiguo al +reciente).
 usort($biblioteca, function($a, $b){
    return$a['año']-$b['año'];
 });

 echo"Libros ordenados por año de publicación:","<br>";
 imprimirBiblioteca($biblioteca);

 //4.Ordenar libros alfabeticamente por titulo.
 usort($biblioteca, function($a, $b){
    return strcmp( $a['titulo'], $b['titulo']);
 });
 echo"Libros ordenas alfabeticamente por titulo:","<br>";
 imprimirBiblioteca($biblioteca);
 
 //5.Filtrar libros disponibles(no prestados).
 $librosDisponibles=array_filter($biblioteca, function($libro){
    return!$libro['prestado'];
 });
 echo "Libros dispobibles:","<br>";
 imprimirBiblioteca($librosDisponibles); 

 //6.Filtrar libros por genero.
  function filtrarPorGenero($libros,$genero){
    return array_filter($libros, function($libro) use ($genero){
        return strcasecmp($libro['genero'] ,$genero) === 0;
    });
  }
 $librosCienciaFiccion = filtrarPorGenero($biblioteca, "Ciencia ficcion");
 echo "Libros de Ciencia Ficcion:", "<br>";
 imprimirBiblioteca($librosCienciaFiccion);

 //7.Obtener lista de autores unicos.

 $autores = array_unique(array_column($biblioteca, 'autor'));
 sort($autores);
 echo "Lista de autores unicos:","<br>";
 foreach ($autores as $autor) {
    echo "-$autor","<br>";
 }
 echo "<br>";

 //8.Calcular año promedio de publicacion.
 $añoPromedio = array_sum(array_column($biblioteca, 'año'))/count($biblioteca);
 echo "Año promedio de publicacion: ".round($añoPromedio,2)."<br>","<br>";

 //9.Encontrar el libro mas antiguo y el mas reciente.
 $libroMasAntiguo = array_reduce($biblioteca, function($carry, $libro){
    return (!$carry || $libro["año"] < $carry["año"]) ? $libro : $carry;
 });

$libroMasReciente = array_reduce($biblioteca, function($carry, $libro){
    return (!$carry || $libro["año"] > $carry["año"]) ? $libro : $carry;
});
echo "Libro mas antiguo:{$libroMasAntiguo['titulo']} ({$libroMasAntiguo['año']})","<br>";
echo "Libro mas reciente:{$libroMasReciente['titulo']} ({$libroMasReciente['año']})","<br>";

//10.TAREA: Implementa una funcion de busqueda que permita buscar libros por titulo o autor.
//la funcion debe ser capaz de manejar busquedas parciales  y no debe ser  sensible a mayus.. / minis...

function buscarLibros($biblioteca , $termino){
    return array_filter($biblioteca, function($libro) use ($termino){
        return stripos($libro['titulo'], $termino) !== false || 
               stripos($libro['autor'], $termino) !== false;
    });

}

//Ejemplo de uso de la función de búsqueda (descomenta para probar)
$resultadosBusqueda = buscarLibros($biblioteca, "quijote");
 echo "Resultados de búsqueda para 'quijote':\n";
imprimirBiblioteca($resultadosBusqueda);


//11. TAREA: Crea una función que genere un reporte de la biblioteca
// El reporte debe incluir: número total de libros, número de libros prestados,
// número de libros por género, y el autor con más libros en la biblioteca
function generarReporteBiblioteca($biblioteca) {
    $totalLibros = count($biblioteca);

    //numero de libros prestados 
    $prestados= count(array_filter($biblioteca, function($libro){
        return $libro['prestado'];
    }));
    //numeros libros por genero.
    $librosPorGenero =[];
    foreach ($biblioteca as $libro) {
        $genero= $libro['genero'];
        if (!isset($librosPorGenero[$genero])) {
            $librosPorGenero['genero'] = 0;
        }
        $librosPorGenero['genero']++;
    }
    //Autores con + libros.

     $librosPorAutor = [];
    foreach ($biblioteca as $libro) {
        $autor = $libro["autor"];
        if (!isset($librosPorAutor[$autor])) {
            $librosPorAutor[$autor] = 0;
        }
        $librosPorAutor[$autor]++;
    }
     //Se ordena para saber el que mas libro  tiene 
     arsort($librosPorAutor);
    $autorTop = key($librosPorAutor);


      // Retornar el reporte como array
    return [
        "total_libros" => $totalLibros,
        "libros_prestados" => $prestados,
        "libros_por_genero" => $librosPorGenero,
        "autor_top" => [
            "nombre" => $autorTop,
            "cantidad" => $librosPorAutor[$autorTop]
        ]
    ];

//hacemos reporte 

 /* echo "<br><strong> Reporte de la Biblioteca</strong><br>";
    echo "Número total de libros: $totalLibros<br>";
    echo "Número de libros prestados: $prestados<br>";

    echo "Número de libros por género:<br>";
    foreach ($librosPorGenero as $genero => $cantidad) {
        echo "- $genero: $cantidad<br>";
    }

    echo "Autor con más libros: $autorTop ({$librosPorAutor[$autorTop]} libros)<br>";
 */
}

// Ejemplo de uso de la función de reporte (descomenta para probar)
 echo "Reporte de la Biblioteca:\n";
print_r(generarReporteBiblioteca($biblioteca));

?>