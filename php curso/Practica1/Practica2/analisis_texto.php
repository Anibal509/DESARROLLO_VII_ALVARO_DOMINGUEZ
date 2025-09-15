<?php

include "utilidades_texto.php";

$frases= array(
    "Hola Mundo Cruel ",
    "Me falta Practica",
    "Tiene Toda la Razon "
);

?>   
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis de Texto</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .frase {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .resultado {
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }

    </style>
</head>
<body>
    <h2 style="text-align: center;">Resultados de Analisis de Texto</h2>
    <table> 
        <tr>
            <th>$frase</th>
            <th>N de palabras</th>
            <th>N de vocales</th>
            <th>Frase Invertida</th>
        </tr>
    <?php
        foreach($frases as $frase){
          echo "<tr>";
          echo"<td>$frase</td>";
          echo"<td>".contar_palabras($frase)."</td>";
          echo"<td>".contar_vocales($frase)."</td>";
          echo"<td>".invertir_palabras($frase)."</td>";
          echo"</tr>";

        }   
    ?> 
 </table>
</body>
</html>







