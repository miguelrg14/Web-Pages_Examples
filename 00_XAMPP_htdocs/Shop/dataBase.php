<?php

$user = "root";
$pass = "";
$server = "localhost";
$dataBase = "FurnitureShopBBDD";

// Abro la conexión al servidor MySQL d la base de datos
    // [Jerarquía] mysqli_connect ( [cadena equipo_anfitrión [, cadena usuario [, cadena contraseña [, cadena base_de_datos [, int puerto [, cadena socket]]]]]] )
$connection = mysqli_connect($server, $user, $pass) or die("no se puede conectar a la bbdd");
// Selecciono la base de datos por defecto para realizar las consultas
    // [Jerarquía] mysqli_select_db(mysqli $link, string $dbname): bool
$dataBase = mysqli_select_db($connection, $dataBase) or die("no se puede conectar con la bbdd");

/// Cerrar conexión
//mysqli_close($connection);
?>
