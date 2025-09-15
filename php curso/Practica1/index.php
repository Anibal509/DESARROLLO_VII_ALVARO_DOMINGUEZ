<?php 
$nombre="alvaro";
$edad="30";
$correo="example@hotmal.com";

echo "Hello my name is ".$nombre.", I am ".$edad." years old,my email is".$correo.".<br>" ;

//echo "Hello my name is ". $nombre.",I am ". $edad."years old, my email is".$correo.".<br>";

echo "hello my name is $nombre Iam $edad year old , my email is $correo.<br>";


echo "hello, my name is {$nombre} I am {$edad} years old, my email is {$correo} <br>";
"<br>";

// programa que diga si eres mayor o menor de edad segun var.--->edad.

$edad=45;

if($edad>=18){
    echo "eres mayor de edad.<br><br>";
}else{
    echo "no eres mayor de edad.<br><br>";
}


//tabals de multiplicar //
for($i=1; $i <= 10 ;$i++){

    echo "5 x $i= ".(5*$i)."<br>";
}

//suma de numeros  1 al 5 

$i=1;
$suma= 0;

while($i<=5){
    $suma= $suma + $i++ ;
    $ii;
}
echo" la suma es:$suma <br>";


?>
