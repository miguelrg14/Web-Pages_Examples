<?php
$user="abc";
$password="123";

login();


function login()
{
    if($_POST["user"] == $user AND $_POST["pass"] == $pass)
    {
        header("Location:ok.html");
    }
    else
    {
        header("Location:noOk.html");
    }
}
?>