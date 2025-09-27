<?php
//CREAR arreglos de 10 nombres de ciuades

$ciudades = ["Nueva York", "Tokio", "Londres", "Paris", "Sidney", "Rio Janeiro", "Moscu", "Berlin", "Ciudad del Cabo", "Toronto"];

//2.Imprimir el areglo origianl
echo "Ciudades originales:","<br>";
print_r($ciudades);

//3.Agregar 2 ciudades mas al fianl del arreglo
array_push($ciudades,"Dubai","Singapur");

//4.Eliminar la tercera ciudad del arreglo .
array_splice($ciudades,2,1);

//5.Insertar una nueva ciudad en la quinta posicion .
array_splice($ciudades,4,0,"munbai");

//8.Imprimir el arreglo modificado.
echo "<br>","Ciudades Modificadas:","<br>";
print_r($ciudades);

//7.Crear una funcion que imprima las ciudades en orden alfabeticos .
function imprimirCiudadesOrdenadas($arr){
  $ordenado = $arr;
  sort($ordenado);
  echo"<br>","Ciudades en orden alfabetico:","<br>";
  foreach ($ordenado as $ciudad) {
    echo "- $ciudad:","<br>";
  }
}
// 8. LLamar a la funcion imprimir ciudades ordenadas.
imprimirCiudadesOrdenadas($ciudades);

//Tare: Crea una funcion que cuente y retorne el numero de ciudades que comienzan con la letra especifica.
//ejempo de suso: ContarciudadesePorInicial($ciudades, 'S'), deberia retornar Singapur 

function contarCiudadesPorInicial($arreglo, $letra){
    $contador =0;
//se convierte la letra a mayuscula para evitar diferencias con mayu.. y min../
$letra = strtoupper($letra);
//recorremos el arreglo paara buscar coincidencias con inial 'M'.
foreach ($arreglo as $ciudad) {
    if (strtoupper(substr($ciudad,0,1))=== $letra) {
        $contador++;
    }
} 
return $contador;

}
$numero= contarCiudadesPorInicial($ciudades,'M');
echo "", "Numer de ciudades que empiezan con letra 'M': $numero";

//opcion 2 array-filter
function imprimirCiudadesPorIniciale($arreglo,$leter){
    $leter = strtoupper($leter);// convierte a mayuscula.
    //hacemos el filtro de solo las ciudades que comienzan con la letra 'M'.
    $filtro = array_filter($arreglo, function($ciudad) use ($leter){
        return strtoupper(substr($ciudad,0,1))== $leter;
    });
    //me retorna el numero de elementos filtrados .
    return count($filtro);
}
$numero = imprimirCiudadesPorIniciale($ciudades, 'M');
echo "<br>","Numero de ciudades que empiezan con M: $numero";
?>