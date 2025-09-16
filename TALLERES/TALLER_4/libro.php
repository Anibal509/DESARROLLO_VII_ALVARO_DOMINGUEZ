<?php
/* class Libro{
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $cantidPagina;

public function __construct($titulo,$autor,$anioPublicacion,$cantidPagina){

    $this ->titulo=$titulo;
    $this -> autor=$autor;
    $this ->anioPublicacion= $anioPublicacion;
    $this ->cantidPagina=$cantidPagina;
}

public function obtenerInformacion(){
    return "'{$this->titulo}' por {$this->autor}, publicado en {$this->anioPublicacion}, y con {$this->cantidPagina}";

}
}



// Ejemplo de uso
$miLibro = new Libro("Cien años de soledad", "Gabriel García Márquez", 1967 ,560 );
echo $miLibro->obtenerInformacion();
 */

// con PRESTABLE /recordar el commit 

require_once 'Prestable.php';

class Libro implements Prestable {
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $cantidPagina;

    private $disponible = true; // por defecto.

    public function __construct($titulo, $autor, $anioPublicacion, $cantidPagina = 0) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
        $this->cantidPagina = $cantidPagina;
    }

    // public function obtenerInformacion() {
    //     return "Título: {$this->titulo}, Autor: {$this->autor}, Año: {$this->anioPublicacion}, Páginas: {$this->cantidPagina}";
    // }
    public function obtenerInformacion() {
        $info = "Titulo: {$this->titulo}\n";
        $info .= "Autor: {$this->autor}\n";
        $info .= "Año de Publicación: {$this->anioPublicacion}\n";
        $info .= "Páginas: {$this->cantidPagina}";
        return $info;
    }

    // Métodos de la interfaz Prestable
    public function prestar() {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->disponible = true;
    }

    public function estaDisponible() {
        return $this->disponible;
    }
}
//Ejemplo de uso 
$libro = new Libro("Rayuela","Julio Cortazar","1963","340");
echo nl2br($libro->obtenerInformacion());
echo "Disponible:".($libro->estaDisponible()? "Si":"No")."<br>";
$libro->prestar();
echo "Disponible despues de prestar:".($libro->estaDisponible()? "Si":"No")."<br>";
$libro->devolver();
echo "Disponible despues de devolver:".($libro->estaDisponible()? "Si":"No")."<br>";
?>