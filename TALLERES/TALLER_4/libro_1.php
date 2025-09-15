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
public function getTitulo() {
    return $this->titulo;
}
public function setTitulo($titulo) {
    $this->titulo =trim($titulo) ;
}
public function getAutor(){
    return $this->autor;
}
public function setAutor($autor){
     $this ->autor=trim($autor);
}
public function getAnioPublicacion(){
    return $this->anioPublicacion;
}
public function setAnioPublicaccion($anio){
$this->anioPublicacion=intval($anio);
}
public function getCantidPagina(){
    return $this->cantidPagina;
}
public function setCantidPagina($cantidPagina){
    $this->cantidPagina = intval($cantidPagina);
}

public function obtenerInformacion() {
    return [
        "titulo" => $this->getTitulo(),
        "autor" => $this->getAutor(),
        "anioPublicacion" => $this->getAnioPublicacion(),
        "cantidPagina" => $this->getCantidPagina()
    ];
}
}

//Ejemplo de Uso

$miLibro =new Libro("EL Quijote","Miguel de Servantes","1605","560");
echo $miLibro->obtenerInformacion();
echo "\nTitulo:".$miLibro->getTitulo();
?>
