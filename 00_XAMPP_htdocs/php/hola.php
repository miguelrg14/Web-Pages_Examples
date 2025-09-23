<html>
    <head>

    </head>

    <body>
        <?php
            function operacion ($n1, $n2, $operacion)
            {
                switch($operacion)
                {
                    case "+":
                        return($n1 + $n2);
                        break;
                    case "-":
                        return($n1 - $n2);
                        break;
                    case "/":
                        return($n1 / $n2);
                        break;
                    case "*":
                        return($n1 * $n2);
                        break;
                    default:
                        return("No se puede realizar la operación!");
                        break;
                }
            }

            $num = 5;
            $num2 = 2;
            $ope = "a";            
            
            $pepe = operacion($num, $num2, $ope);
            echo $pepe;
        ?>


    <p>Hola</p>
        <?php 
        // Variables
        $joao = 0; // int
        $maka = 2.3; // float
        $messi = "Messi sobrevalorao, viva el beti illo"; // char
        $bool = true; // booleano
        echo "Joao ==> " .$joao;
        echo "<br>";
        echo "Maka ==> " .$maka;
        ?>

        <?php
        echo "<br>";
        echo "Messi ==>  " .$messi;
        echo "<br>";
        echo "Bool ==>  " .$bool;
        echo "<br>";
        echo gettype($bool);
        $bool = 334;
        echo"<br>";
        echo gettype($bool);
        define("MAX", 650);
        define("MIN", 123);
        echo "<br>";
        echo "el máximo es " .MAX;
        echo "<br>";
        echo "el mínimo es " .MIN;
        echo "<br>";

        $nombre = "Manolo Lama";
        echo "el nombre es" .$nombre;
        echo 'el nombre es $nombre';
        echo "<br>";

        $v1 = 100;
        $v2 = &$v1;
        $v3 = $v1;

        echo "$v1<hr>$v2<hr>$v3<hr>";
        $v2 = 200;
        echo "$v1<hr>$v2<hr>$v3<hr>";
        $v1 = 150;
        echo "$v1<hr>$v2<hr>$v3<hr>";

        echo $_SERVER["PHP_SELF"];

        $randAux = rand(-50, 50);
        echo "<hr><hr>$randAux";

        if($randAux < 0)
        {
            echo"<br>Es NEGATIVO";
        }
        else if($randAux == 0)
        {
            echo"<br>Es CERO";
        }
        else
        {
            echo"<br>Es POSITIVO";
        }
        ?>


        <?php // phpinfo?>

    <!--
    <p>Este es un Nº aleatorio entre 1 - 20</p>
    <p>El Nº es:<b><?php // echo rand(0, 20);?></b></p>
    -->
    <?php 
    $varParImpar = rand(MIN, MAX);
    echo("<hr><hr><h1> El valor es </h1>");
    if ($varParImpar % 2)
    {
        echo ("<span style='color: red'> $varParImpar </span> es impar");
    }
    else
    {
        echo("es par");
    }
    /*
    for ($i=0; $i<=$varParImpar; $i++)
    {
        echo("<hr>");
    }
    */
    $Resultado;
    for ($a=0; $a<=10; $a++)
    {
        $NumTabla = $a;

        echo("<hr> Esta es la tabla del $NumTabla");
        for ($i=0; $i<=10; $i++)
        {
            $Resultado = $NumTabla * $i;
            echo("$NumTabla * $i = $Resultado <br>");
        }
    }
    /* ESTÁ MAL
    echo("<h2>while</h2>")
    $auxwhile = 0;
    while ($auxwhile < $varParImpar)
    {
        echo("<hr> valor");
        $auxwhile++;
    }
    */
    $Array = array('ElPepe', "Mamawebo", "Elrubius");

    print_r($Array);

    foreach ($Array as $Valores)
    {
        echo ("$Valores <br>");
    }

    $dnis = [ "53859262" => "ElPepe",
                "12345678" => "Mamawebo",
                "78409357" => "Elrubius"
            ];

    foreach ($dnis as $dni => $nom)
    echo("El nombre: $nom - El pinche DNI: $dni <br>")
    ?>
    <?php

    $Temp = ["Lunes" => 20,
    "Martes" => 20,
    "Miercoles" => 25,
    "Jueves" => 13,
    "Viernes" => 15,
    "Sabado" => 16,
    "Domingo" => 18
        ];
    

    $TempMax = 0;
    $TempMin = 0;
    $tacum = 0;

    foreach ($Temp as $dia => $t)
    {
        if ($t > $TempMax)
        {
            $TempMax = $t;
        }
        if ($t < $TempMax)
        {
            $TempMin = $t;
        }
        $tacum += $t;
    }
    echo("Temp Máx fue... $TempMax <hr>");
    echo("Temp Mín fue... $TempMin <hr>");
    
    /* MAL
    for($e = 0; $e <= 6; $e++)
    {
        $TempMax = $Temp[$e];
    }
    */
    /* MAL
    foreach ($Temp as $TempMax)
    {
        if($TempMax < $Temp)
        {
            $TempMax = $Temp;
        }
    }
    */
    ?>

    </body>
</html>