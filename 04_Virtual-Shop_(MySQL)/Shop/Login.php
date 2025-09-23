<!DOCTYPE html>
<!-- Lenguaje Español -->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Furniture Shop!</title>
        <link rel="shortcut icon" href="Img/Favicon/Favicon.png">
        <link rel="stylesheet" href="./estilos/LogCSS.css">
    </head>
    <!-- Empieza la página -->
    <body>
        <!-- Menú d navegación -->
        <header>        
            <nav>
                <ul>
                    <li><a href="Login.php" class="LetraMenu"><img class="headerIcons" src="./Img/Icons/Login.png" alt="" title="Login"></a></li>
                    <li><a href="Register.php" class="LetraMenu"><img class="headerIcons" src="./Img/Icons/Register.png" alt="" title="Register"></a></li>
                </ul>                
            </nav>
        </header>
        <!-- Info -->
        <main>
            <section>
                <article>
                    <ul>
                        <li>
                            <h1>Login!</h1>                            
                        </li>
                        <li>
                            <!-- Form ==> Enlaza al php d login -->
                            <form action="processLogin.php" method="POST">
                                <p>Mail</p>
                                <input type="text" name="email" placeholder="Email">
                                
                                <p>Password</p>
                                <input type="password" name="password" placeholder="Password">
                                
                                <input type="submit" value="Send">                                
                            </form>
                        </li>
                    </ul>
                    <img class="picture1" src="./Img/Login/Beach.jpg" alt="">
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