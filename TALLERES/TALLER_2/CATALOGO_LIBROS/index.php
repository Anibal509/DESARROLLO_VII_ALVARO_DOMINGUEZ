<?php
include 'includes/funciones.php';
include 'includes/header.php';

$libros = obtenerLibros();

foreach ($libros as $libro) {
    echo mostrarDetallesLibro($libro);
}

include 'includes/footer.php';
?>
