<?php
    
    $num1=2;
    $num2=4;

    if (isset($num1) && isset ($num2)) {

        $suma=$num1+$num2;
        $resta=$num1-$num2;
        $multiplicacion=$num1* $num2;
    if ($num1 !=0) {
        $division=$num1/$num2;
    }else {
        $division ="error : no se puede dividir entre 0";
    }
    }
?>
<!DOCTYPE html>
<html>
    <head>
       <title>Mi aCalculadora PTY</title> 
    </head>
    <body>
        <h2>operaciones</h2>
        <p>Numero1:<?php echo $num1 ;?></p>
        <p>Numero2:<?php echo $num2;?></p>   

        <ul>
            <li><b>Suma:</b><?php echo $suma; ?></li>
            <li><b>Resta:</b><?php echo $resta?></li>
            <li><b>Multiplicacion:</b><?php echo $multiplicacion?></li>
            <li><b>Division</b><?php echo $division?></li>
        </ul>
        
        <hr>
        <h3>Tabla de multiplicar del <?php echo $num1;?></h3>
        <table border="">
            <tr><th>Expresion</th><th>Resultado</th></tr>
            <?php
            for ($i=1; $i <=10 ; $i++) {  
                echo "<tr>";
                echo "<td>$num1 x$i</td>";
                echo "<td>".($num1 *$i)."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
 