<?php
require_once 'libro.php';
require_once 'libroDigital';

class Biblioteca{
    private $libros=[];

    public function agregarLibro($libro) {
        $this->libros[] = $libro;
    }

    public function listarLibros() {
        foreach ($this->libros as $libro) {
            echo nl2br($libro->obtenerInformation());
            echo "Disponible: " . ($libro->estaDisponible() ? 'Sí' : 'No') . "<br>";
        }
    }

    public function prestarLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo()=== $titulo && $libro->estaDisponble()) {
                $libro->prestar();
                return true;
            }
        }
        return false;
    }
    public function devolverLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $titulo && !$libro->estaDisponible()) {
                $libro->devolver();
                return true;
            }
        }
        return false;
    }
}

// Ejemplo de uso 
$biblioteca = new Biblioteca();

$libro1 = new Libro("El principito", "Antoine de Saint-Exupéry", 1943,234);
$libro2 = new LibroDigital("Dune", "Frank Herbet", 1965,890,"EPUB", 3.2);

$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);

echo "Listado inicial de  libros:". "<br>";
$biblioteca->listarLibros();

echo "Prestando 'El Principito '...."."<br>";
$biblioteca->prestarLibro("El Principito");

echo "Listado despues de prestar:"."<br>";
$biblioteca->listarLibros();

echo "Devlviendo 'El Principito'...."."<br>";
$biblioteca->devolverLibro("El Principito");

echo "Listado Final:"."<br>";
$biblioteca->listarLibros();
?>