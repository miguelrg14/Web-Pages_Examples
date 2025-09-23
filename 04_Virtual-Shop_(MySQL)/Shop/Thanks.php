<?php
session_start();
$product_ids = array();

/// [Checkout] Reset products!
if(filter_input(INPUT_GET, 'action') == 'checkout')
{
    //echo '<script language="javascript">alert("Successful purchase! You will recieve the package soon");</script>';
    echo "<script>
    alert('There are no fields to generate a report');
    window.location.href='admin/ahm/panel';
    </script>";
    session_destroy();
    header("Location:Products.php");
}
/// [Checkout] Reset products!
if(filter_input(INPUT_GET, 'action') == 'logout')
{
    session_destroy();
    header("Location:Login.php");
}

?>
                            <!-- COMIENZO PÁGINA -->
<!DOCTYPE html>
<!-- Lenguaje Español -->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products Furniture Shop!</title>
        <link rel="shortcut icon" href="Img/Favicon/Favicon.png">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="./estilos/ShopCSS.css">
    </head>
    <!-- Empieza la página -->
    <body>
        <!-- Menú d navegación -->
        <header>        
            <nav>
                <ul>
                    <li>                                                  
                        <form action="Products.php?action=logout"  method="POST">
                            <a href="#"><input type="submit" name="LogOut" value="LogOut"></a>
                        </form>
                    </li>
                    <li><a href="Products.php"><img class="headerIcons" src="./Img/Icons/Cart.png" alt="" title="Go back to shop"></a></li>
                </ul>              
            </nav>
        </header>
        <!-- Info -->
        <main>            
            <!-- Form -->
            <section>
                <article>
                    <h1>Thanks for buying!</h1>
                    <img class="picture1" src="./Img/Entry/LR1.jpg" alt="">                    
                    <?php
                    echo '<script language="javascript">alert("Successful purchase! You will recieve the package soon");</script>';
                    ?>
                </article>
            </section>
        </main>
        <!-- Final -->
        <footer>
            <p>
                <a class="Negrita">Página realizada por Miguel Rodríguez Gallego</a>
            </p>
            <p>
                <a>Este es un trabajo para la carrera de Ingeniería de videojuegos</a>
            </p>
        </footer>
    </body>
</html>