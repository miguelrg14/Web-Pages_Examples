<?php
// Conecto a la base de datos
    /* INFO
        El require copia el contenido del php aquí, y si no funciona devuelve
        1 error fatal, mientras q el "include", su mayor parecido, dejaría seguir
        funcionando a la página y solo mostraría un "E_WARNING" dejando continuar al script
    */
include('dataBase.php');

// Variables con las que cojo el "mail" y "contraseña" introducidas x el cliente
$email=$_POST['email'];
$password=$_POST['password'];

$query="SELECT*FROM client where Email='$email' and Password='$password'";

$result=mysqli_query($connection,$query);

// Reviso las columnas de info
$rows=mysqli_num_rows($result);
// Si el usuario ya existe no lo inserta al ser repetido
if($rows != null)
{
    header("Location:Register.php");
}
// Si el usuario es nuevo lo inserta y lo redirige a la página
else
{
    $insert = "INSERT INTO client (Email, Password) VALUES ('$email' , '$password')";
    mysqli_query($connection, $insert) or die ("Algo ha ido mal en el insert");
    header("Location:Products.php");
}

// Cerrar conexión
mysqli_close($connection);
?>