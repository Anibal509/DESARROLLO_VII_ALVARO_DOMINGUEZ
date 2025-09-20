<!-- <
require_once "Empleado.php";

class Gerente extends Empleado{
private $departamento; // departamento que gestiona 
private $bono=0;        // metodo de bono 

public function __construct($nombre, $idEmpleado, $salarioBase, $departamento) {
    parent::__construct($nombre, $idEmpleado, $salarioBase);
    $this->departamento = $departamento;
}

public function getDepartamento() {
    return $this->departamento;
}

public function setDepartamento($departamento) {
    $this->departamento = $departamento;
}

public function getBono() {
    return $this->bono;
}

public function setBono($bono) {
    $this->bono = $bono;
}
   // calculamos el bono aparte para gerentes / luego de evaluar el rendimiento.
   // en este caso el bono depende de condiciones externas

    public function calcularSalarioTotal() {
        return $this->getSalarioBase() + $this->bono;
    }
} -->
 
<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

class Gerente extends Empleado implements Evaluable{
    private $departamento;
    private $bono=0;

    public function __construct($nombre,$idEmpleado,$salarioBase,$departamento) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->departamento = $departamento;
}

public function getDepartamento() {
    return $this->departamento;
}

public function setDepartamento($departamento) {
    $this->departamento = $departamento;
}

public function getBono() {
    return $this->bono;
}

public function setBono($bono) {
    $this->bono = $bono;
}
public function calcularSalarioTotal() {
    return $this->getSalarioBase() + $this->bono;
}

public function evaluarDesempeno() {
    if ($this-> bono == 1000) {
        return "Gerente con un desempeño EXCELENTE.";
    } elseif ($this->bono > 500) {
        return"Gerente con un desempeño BUENO .";
    } else {
        return "Gerente debe mejor su desempeño.";
    }
}

}
