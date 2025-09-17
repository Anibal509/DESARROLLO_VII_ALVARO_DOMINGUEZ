<?php
/* class Libro {
    public $titulo;
    public $autor;
    public $anioPublicacion;

    public function __construct($titulo, $autor, $anioPublicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
    }

    public function obtenerInformacion() {
        return "'{$this->titulo}' por {$this->autor}, publicado en {$this->anioPublicacion}";
    }
}

// Ejemplo de uso
$miLibro = new Libro("Cien años de soledad", "Gabriel García Márquez", 1967);
echo $miLibro->obtenerInformacion()
 

class Libro {
    private $titulo;
    private $autor;
    private $anioPublicacion;

    public function __construct($titulo, $autor, $anioPublicacion) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setAnioPublicacion($anioPublicacion);
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = trim($titulo);
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = trim($autor);
    }

    public function getAnioPublicacion() {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion($anio) {
        $this->anioPublicacion = intval($anio);
    }

    public function obtenerInformacion() {
        return "'{$this->getTitulo()}' por {$this->getAutor()}, publicado en {$this->getAnioPublicacion()}";
    }
}

// Ejemplo de uso
$miLibro = new Libro("  El Quijote  ", "Miguel de Cervantes", "1605");
echo $miLibro->obtenerInformacion();
echo "\nTítulo: " . $miLibro->getTitulo();*/

//paso 4 

require_once 'Prestable.php';

class Libro implements Prestable {// Implementa interfaz.
    //Propiedades y Metodos anteriores.
    private $titulo;
    private $autor;
    private $anioPublicacion;
    private $disponible = true; // Nueva metodo.

    public function __construct($titulo, $autor, $anioPublicacion) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setAnioPublicacion($anioPublicacion);
    }


    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = trim($titulo);
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = trim($autor);
    }

    public function getAnioPublicacion() {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion($anio) {
        $this->anioPublicacion = intval($anio);
    }

    // Método para obtener información del libro
    public function obtenerInformacion() {
        return "'{$this->getTitulo()}' por {$this->getAutor()}, publicado en {$this->getAnioPublicacion()}";
    }

    // Métodos de la interfaz Prestable nuevo 
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

// Ejemplo de uso
$miLibro = new Libro("  El Quijote  ", "Miguel de Cervantes", "1605");
echo $miLibro->obtenerInformacion() . "\n";
echo "Disponible: " . ($miLibro->estaDisponible() ? "Sí" : "No") . "\n";

$miLibro->prestar();
echo "Disponible después de prestar: " . ($miLibro->estaDisponible() ? "Sí" : "No") . "\n";

$miLibro->devolver();
echo "Disponible después de devolver: " . ($miLibro->estaDisponible() ? "Sí" : "No") . "\n";
?>


