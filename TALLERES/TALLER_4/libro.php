<?php
 class Libro{
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
    return "'{$this->titulo}' por {$this->autor}, publicado en {$this->anioPublicacion}, y Tiene {$this->cantidPagina} paginas";

}
}

// Ejemplo de uso
$miLibro = new Libro("Cien años de soledad", "Gabriel García Márquez", 1967 ,560 );
echo $miLibro->obtenerInformacion();
 
?>
