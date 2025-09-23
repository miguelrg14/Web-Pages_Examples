<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$baseDatos = "tablamiwi";

// Conectarnos a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $password) or die("no se puede conectar a la bbdd");
// Seleccionamos la bbdd
$bbdd = mysqli_select_db($conexion, $baseDatos) or die("no se puede conectar con la bbdd");
// Realizar la consulta
$consulta = "SELECT * FROM apartamentos";

// Recorre las filas y almacena los valores
while ($columna = mysqli_fetch_array($resultadoConsulta))
{
    ?> <h1>Nombre: <?php echo $columna["Nombre"] ?> </h1>
    <p>Teléfono: <?php echo $columna["Teléfono"] ?> </p>
    <p>Email: <?php echo $columna["Email"] ?> </p>

    <?php
}
// Cerrar conexión
mysqli_close($conexion);
?>