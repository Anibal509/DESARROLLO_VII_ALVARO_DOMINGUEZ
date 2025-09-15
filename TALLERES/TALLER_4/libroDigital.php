<?php
require_once 'libro.php';

class LibroDigital extends Libro {
    private $formatoArchivo;
    private $tamanoMB;

    public function __construct($titulo, $autor, $anioPublicacion,$cantidPagina, $formatoArchivo, $tamanoMB) {
        parent::__construct($titulo, $autor, $anioPublicacion,$cantidPagina);
        $this->formatoArchivo = $formatoArchivo;
        $this->tamanoMB = $tamanoMB;
    }

    public function obtenerInformacion() {
        return parent::obtenerInformacion() . ", Formato: {$this->formatoArchivo}, Tamaño: {$this->tamanoMB}MB";
    }
}

// Ejemplo de uso
$libroDigital = new LibroDigital("1984", "George Orwell", 1949,560, "PDF", 2.5);
echo $libroDigital->obtenerInformacion();
        