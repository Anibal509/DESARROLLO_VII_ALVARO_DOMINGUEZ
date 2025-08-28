<?php

// función llamada obtenerLibros() que retorne un array de libros (simula una base de datos con al menos 5 libros).

function obtene_libros() {
    return= [
   [
    'titulo' => 'El Quijote',
    'autor' => 'Miguel de Cervantes',
    'anio_publicacion' => 1605,
    'genero' => 'Novela',
    'descripcion' => 'La historia del ingenioso hidalgo Don Quijote de la Mancha.'
   ],
    [
    'titulo' => '1984',
    'autor' => 'Geoge Orwell',
    'anio_publicacion' => 1949,
    'genero' => 'Distopia',
    'descripcion' => 'Un mundo totalitario donde el gran hermano vigila todo los movimientos.'
    ],

    [
    'titulo' => 'El Principito',
    'autor' => 'Antoine de Saint -Exupery',
    'anio_publicacion' => 1943,
    'genero' => 'Fastasia',
    'descripcion' => 'Un pequeno principe viaja por planetas aprendiendo lecciones de vida.'
    ],
    [
    'titulo' => 'Orgulo y prejuicio',
    'autor' => 'Jane Austen',
    'anio_publicacion' => 1813,
    'genero' => 'Romance',
    'descripcion' => 'Historia de amor y malentendidos entre Elizabeth Bennet y el sr.Darcy.'
    ],
    [
    'titulo' => 'Arbol',
    'autor' => 'Maria Icapie',
    'anio_publicacion' => 1960,
    'genero' => 'Literatura',
    'descripcion' => 'Pulmon del mundo.'
    ],
    
    ];

}

function mostrarDetallesLibros($libros) {
    return = "
    <div class=\"libros\">
     <h2>{$libros['titulo']}</h2>
    <p><strong>Autor:</strong> {$libros['autor']}</p>
    <p><strong>Autor:</strong> 1libros['anio_publicacion']</p>
    <p><strong>Autor:</strong> {$libros['genero']}</p>
    <p><strong>Autor:</strong> {$libros['descripcion']}</p>
    
</div>
    ";
}
?>
