<html lang="es">
    <head>
        <title>Formulario que pasa por GET</title>
    </head>
    <body>
        <form action="formPOST.php" method="POST">
            <p>Numero 1:
                <input type="text" name="n1">
            </p>
            <p>Numero 2:
                <input type="text" name="n2">
            </p>
            <p>Numero 3:
                <input type="text" name="n3">
            </p>
            <p>
                <select name="op">
                    <option name="+">+</option>
                    <option name="-">-</option>
                    <option name="*">*</option>  
                    <option name="/">/</option>              
                </select>
                <input type="submit" name="enviar" onclick="show();">
            </p>
        </form>
    </body>
</html>