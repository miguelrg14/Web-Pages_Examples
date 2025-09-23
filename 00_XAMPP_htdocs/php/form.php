<?php
/*
    echo "El valor del nombre es " .$_GET["v1"];
    echo "<br>";
    echo "El valor del apellido es " .$_GET["v2"];
*/
    $n1 = $_GET["n1"];
    $n2 = $_GET["n2"];
    $n3 = $_GET["n3"];
    $op = $_GET["op"];

    // Incluyo el formulario en este mediante el enlace "include"
    include "index.php";

    //echo(operacion($n1, $n2, $op));

    echo(show($n1, $n2, $n3));

    function show($n1, $n2, $n3)
    {
        echo("<hr> Valor 1: $n1");
        echo("<hr> Valor 2: $n2");
        echo("<hr> Valor 3: $n3");
    }

    function operacion ($n1, $n2, $op)
    {
        if($n1 != null && $n2 != null)
        {
            switch($op)
            {
                case "+":
                    return ($n1 + $n2);
                    break;
                case "-":
                    return ($n1 - $n2);
                    break;
                case "/":
                    return ($n1 / $n2);
                    break;
                case "*":
                    return ($n1 * $n2);
                    break;
                default:
                    return("No se puede realizar la operación!");
                    break;
            }
        }
        else
        {
            echo("No se puede realizar la operación!");
        }
        /*
        $resultado = 0;
        switch($operacion)
        {
            case "+":
                $resultado = ($n1 + $n2);
                echo($resultado);
                break;
            case "-":
                $resultado = ($n1 - $n2);
                break;
            case "/":
                $resultado = ($n1 / $n2);
                break;
            case "*":
                $resultado = ($n1 * $n2);
                break;
            default:
                return("No se puede realizar la operación!");
                break;
        }
        */
    }      
?>
