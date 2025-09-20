<?php
// require_once 'Empleado.php'    ;

// class Desarrollador extends Empleado{
//     private $lenguajePrincipal;
//     private $nivel_experiencia;

// public function __construct($nombre, $salario, $lenguajePrincipal, $nivel_experiencia) {
//     parent::__construct($nombre, $salario);
//     $this->lenguajePrincipal = $lenguajePrincipal;
//     $this->nivel_experiencia = $nivel_experiencia;
// }
// public function getLenguajePrincipal() {
//     return $this->lenguajePrincipal;
// }

// public function setLenguajePrincipal($lenguajePrincipal) {
//     $this->lenguajePrincipal = $lenguajePrincipal;
// }

// public function getNivelExperiencia() {
//     return $this->nivel_experiencia;
// }

// public function setNivelExperiencia($nivel_experiencia) {
//     $this->nivel_experiencia = $nivel_experiencia;
// }
// }

require_once 'Empleado.php';
require_once 'Evaluable.php';

class Desarrollador extends Empleado implements Evaluable{
    private $lenguajePrincipal;
    private $nivelExperiencia;// si es junior,semi-senior, senior.

    public function __construct($nombre,$idEmpleado,$salarioBase,$lenguajePrincipal,$nivelExperiencia)
    {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->lenguajePrincipal = $lenguajePrincipal;
        $this->nivelExperiencia = $nivelExperiencia;
    }

    public function getLenguajePrincipal() {
        return $this->lenguajePrincipal;
    }

    public function setLenguajePrincipal($lenguajePrincipal) {
        $this->lenguajePrincipal = $lenguajePrincipal;
    }

    public function getNivelExperiencia() {
        return $this->nivelExperiencia;
    }

    public function setNivelExperiencia($nivel_experiencia) {
        $this->nivelExperiencia = $nivel_experiencia;
    }

    //Implementacion de Evaluable.php

    public function evaluarDesempeno() {
        switch (strtolower($this->nivelExperiencia)) {
            case 'senior':
                return "Desempeño excelente. Lidera proyectos y resuelve problemas complejos.";
            case 'semi-senior':
                return "Buen desempeño. Puede trabajar de forma autónoma y resolver la mayoría de los problemas.";
            case 'junior':
                return "Desempeño aceptable. Requiere supervisión y apoyo en tareas complejas.";
            default:
                return "Nivel de experiencia no especificado. Evaluación no disponible.";
        }
    }
}
?>