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
$resultadoConsulta = mysqli_query($conexion, $consulta) or die("no se puede realizar la consulta");

$Nombre = $_POST["Nombre"];
$Telefono = $_POST["Telefono"];
$Email = $_POST["Email"];
$insert = "INSERT INTO apartamentos (Nombre, Telefono, Email) VALUES (
    '$Nombre' , '$Telefono', '$Email')";
mysqli_query($conexion, $insert) or die ("Algo ha ido mal en el insert");
    // Cerrar conexión
    mysqli_close($conexion);
?>