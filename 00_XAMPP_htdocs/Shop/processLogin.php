<?php
// Conecto a la base de datos
include('dataBase.php');

// Variables con las que cojo el "mail" y "contraseña" introducidas x el cliente
$email=$_POST['email'];
$password=$_POST['password'];

/// Login
// Creo la consulta, en donde selecciono el "mail" y "contraseña" de la base de datos
    /* INFO
        The WHERE clause is used to filter records.
        The WHERE clause is used to extract only those records that fulfill a specified condition.
        SELECT column_name(s) FROM table_name WHERE column_name operator value 
    */
    // El "SELECT" solo hace lectura
    // "Update, insert & delete" Únicas instrucciones q modifican la BBDD
$query="SELECT*FROM client where Email='$email' and Password='$password'";
// Uso la conexión intrínseca en "dataBase.php" en "$connection"
    /* INFO
        mysqli_query(mysqli $link, string $query, int $resultmode = MYSQLI_STORE_RESULT): mixed
    */
$result=mysqli_query($connection,$query);

// Reviso las columnas de info
$rows=mysqli_num_rows($result);

// Si el cliente existe en las columnas entrará a la página
if($rows != null)   {   header("Location:Products.php");  }
// Si no existe, lo redirige al registro de usuarios
else    {   header("Location:Register.php");    }

// Cierro la conexión a la base de datos
mysqli_close($connection);
?>