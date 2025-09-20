<?php
//1.Crea una clase base llamada Empleado con las siguientes propiedades: Nombre ID de empleado Salario base
class Empleado{
    public $nombre;
    public $idEmpleado;
    public $salarioBase;

    public function __construct($nombre,$idEmpleado,$salarioBase){
        $this->nombre = $nombre;
        $this->idEmpleado = $idEmpleado;
        $this->salarioBase = $salarioBase; 
    }
        //2.Implementa métodos getter y setter apropiados para estas propiedades.

 public function getNombre() {
    return $this->nombre;
}

public function setNombre($nombre) {
    $this->nombre = trim($nombre);
}
public function getIdEmpleado() {
    return $this->idEmpleado;
}

public function setIdEmpleado($idEmpleado) {
    $this->idEmpleado = trim($idEmpleado);
}

public function getSalarioBase() {
    return $this->salarioBase;
}

public function setSalarioBase($salarioBase) {
    $this->salarioBase = floatval($salarioBase);
}
    }
 