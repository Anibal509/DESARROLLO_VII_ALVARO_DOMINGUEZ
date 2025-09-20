<?php
// /* require_once 'Empleado.php' ;   
// require_once 'Evaluable.php' ;   */

// require_once 'Empleado.php';
// require_once 'Gerente.php';
// require_once 'Desarrollador.php';
// require_once 'Evaluable.php';
 
// class Empresa{
//     private $empleados = [];

//     public function agregarEmpleado(Empleado $empleado) {
//         $this->empleados[] = $empleado;
//     }

//     public function listarEmpleados() {
//         foreach ($this->empleados as $empleado) {
//             echo "ID".$empleado->getIdEmpleado()."|";
//             echo "Nombre:".$empleado->getNombre()."|";
//             echo "Salario base: $".$empleado->getSalarioBase()."<br>";
//         }
//     }

//     public function calcularNominaTotal() {
//         $total = 0;
//         foreach ($this->empleados as $empleado) {
//             //si es gerente ,considermaos el bono.
//             if ($empleado instanceof Gerente) {
//                 $total +=$empleado->calcularSalarioTotal();
//             }else{
//             $total += $empleado->getSalarioBase();
//             }
//         }
//         return $total;
//     }
//      //Evaluacion   de desempeño para todos los empleados evaluables 
    
//      /** @var Empleado $empleado */

//      // Aquí agregamos el var_dump para revisar los objetos antes de evaluar desempeño

//       echo "<pre>";
// var_dump($empresa);
// echo "</pre>";

// $empresa->evaluarDesempeno();


//     public function evaluarDesempeno() {
//     foreach ($this->empleados as $empleado) {
//         if ($empleado instanceof Evaluable) {
//             echo $empleado->getNombre() . ": " . $empleado->evaluarDesempeno() . "<br>";
//         } else {
//             echo $empleado->getNombre() . ": No es evaluable.<br>";
//         }
//     }
// }


// }

require_once 'Empleado.php';
require_once 'Evaluable.php';
require_once 'Gerente.php';
require_once 'Desarrollador.php';

class Empresa {
    private $empleados = [];

    public function agregarEmpleado(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    public function listarEmpleados() {
        foreach ($this->empleados as $empleado) {
            echo "ID" . $empleado->getIdEmpleado() . "|";
            echo "Nombre:" . $empleado->getNombre() . "|";
            echo "Salario base: $" . $empleado->getSalarioBase() . "<br>";
        }
    }

    public function calcularNominaTotal() {
        $total = 0;
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Gerente) {
                $total += $empleado->calcularSalarioTotal();
            } else {
                $total += $empleado->getSalarioBase();
            }
        }
        return $total;
    }

    public function evaluarDesempeno() {
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Evaluable) {
                echo $empleado->getNombre() . ": " . $empleado->evaluarDesempeno() . "<br>";
            } else {
                echo $empleado->getNombre() . ": No es evaluable.<br>";
            }
        }
    }
}
?>


