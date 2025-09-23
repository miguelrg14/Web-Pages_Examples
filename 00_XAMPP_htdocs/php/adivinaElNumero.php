<html>
    <head>
        <title>Adivina pibe</title>
    </head>
    <body>
        <h1>Adivina el Nº...</h1>
        <form action="adivinaElNumero.php" method="POST">
            <p>Introduce el nº</p>
            <input type="text" name="numero" id="">
            <input type="hidden" name="oculto" value="
            <?php
            if(isset($_POST["oculto"])) {echo($_POST["oculto"]);}
            else
            {
                $aleatorio = rand(1, 100);
                echo $aleatorio;
            }
            ?>">     
            <p>Num aleatorio</p> 
            <?php       
            if(isset($_POST["oculto"]))
            {
                echo($aleatorio = $_POST["numero"]);
            }
            ?>
        </form>
    </body>
</html>

<?php
if(isset($_POST["oculto"]))
{
    echo($_POST["oculto"]);
}

if(isset($_POST["oculto"]))
{
    // Generador d Nºs random
    $randNum = 1;
    $min = 0;
    $max = 100;
    $randNum = rand($min, $max);
    echo($randNum);
    
    // Nº q elijo para comparar
    $numQueElijo = $_POST["miNum"];
    

    // Comparación    
    if ($randNum == $numQueElijo)
    {
        echo(" Oleeeee");
    }
    else
    {
        echo(" Vaya paquete, refresca anda...");
    }
}
?>