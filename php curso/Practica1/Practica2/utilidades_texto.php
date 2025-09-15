<?php
    function contar_palabras($texto){
        $contador=0; 
        $es_palabra=false;//bandera indica si estoy dentro de una palabra 
        $i=0; 

        while(isset($texto[$i])){
            $caracter= $texto[$i];

        if ($caracter!=" "&& $caracter!="\t" && $caracter !="\n"){ // comparacion si es un espacio blanco , tabulacion o salta linia 

            if($es_palabra == false){
                $contador++;
                $es_palabra = true;
            }
        }else{
            $es_palabra = false; 
        }
        $i++;
        }
        return $contador;  

    }

        //funcion contar vocales 
        function contar_vocales($texto){

            $contador=0; // cuenta la cadena texto cuantas vocale shay  
            $i=0;        //recorre la cadena itera letra xletra 
    
        while(isset($texto[$i])){// mientras haya una caracter en la posicion i 
            $caracter=$texto[$i]; // guarda el carater actual 

            if( $caracter == "a"|| $caracter=="A"||// comprobacion de minisculas y mayusculas 
                $caracter =="e" || $caracter=="E"||
                $caracter =="i" || $caracter=="I"||
                $caracter =="o" || $caracter=="O"||
                $caracter =="u" || $caracter=="U"){
                $contador++;  // si es vocal suma 1 al contador 

            }$i++;//pasa al siguiente caracter 

        }return $contador; // devuelve la cant. total de las vocales encontradas 
               
        }

// invertir PALABRA 

function invertir_palabras($texto){ 

    $palabras =array(); // arreglo para guardar cada palabra 
    $palabra=""; // variable temporal para construir una palabra
    $i=0;

    while(isset($texto[$i])){ //recorrer cada caracter del texto 
        
        if($texto[$i]!=" " && $texto[$i]!="\t" && $texto[$i]=!"\n"){ //validamos espacio ,tbab o sallto linia.
            $palabra.=$texto[$i];//construimos la palabra 1 cact. x caract.
        }elseif($palabra!=" "){
            $palabra[] =$palabra;//guardamos palabra
            $palabra = ""; //Reinicia  palabra para construir la siguiente palabra 
        }
        $i++; // avanza al siguiente caracter del texto  para continuar el bucle.
    }
    if($palabra !=" ") $palabra[] = $palabra;// ultima palabra.
    
    $longitud =0;
    while(isset($palabras[$longitud])) $longitud++;

    //invertimos texto recorriendo el array 
    $textInvertido ="";
    for($j =$longitud-1; $j >= 0;$j--){
        $textInvertido.=$palabras[$j];
        if($j > 0)$textInvertido.="";

    }
     return $textInvertido;


}

?>








