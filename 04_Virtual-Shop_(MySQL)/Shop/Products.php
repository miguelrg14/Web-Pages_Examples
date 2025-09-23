<?php
session_start();
$product_ids = array();
//session_destroy();

// Reviso si el boton de añadir al carro se ha pulsado
/* INFO - filter_input
    Toma una variable externa concreta por su nombre y opcionalmente la filtra
*/
if(filter_input(INPUT_POST, 'add_to_cart'))
{
    // Si el carrito de la compra existe...
    /* INFO - $_SESSION
        Es un array asociativo que contiene variables de sesión disponibles para el script actual. Ver la documentación de Funciones de sesión para más información sobre su uso.
    */
    if(isset($_SESSION['shopping_cart']))
    {
        // Contador ==> Nº d productos en el carrito
        $count = count($_SESSION['shopping_cart']);

        // Array secuencial(q tiene el localizador índice) q une el array d productos con sus ids
        $product_ids = array_column($_SESSION['shopping_cart'], 'Id');

        //pre_r($product_ids);

        // Si el producto no existe en el array ==> "++product" al array
        if(!in_array(filter_input(INPUT_GET, 'Id'), $product_ids))
        {
            /// [Creación 1 Array d info]
            $_SESSION['shopping_cart'][$count] = array
            (
                'Id' => filter_input(INPUT_GET, 'Id'),
                'Name' => filter_input(INPUT_POST, 'Name'),
                'Price' => filter_input(INPUT_POST, 'Price'),
                'Quantity' => filter_input(INPUT_POST, 'Quantity')
            );
        }
        // Si el producto ya existe ==> ++"Quantity"
        else
        {
            /* Bucle sobre las ips d "$product_ids" para revisar si el producto ya existe
                y así solo incrementar la cantidad de ese producto dentro del carrito...
            */
            // El "for" básicamente hace coincidir la clave del array con la "Id" del producto que se añade al carrito
            for($i = 0; $i < count($product_ids); $i++)
            {
                if($product_ids[$i] == filter_input(INPUT_GET, 'Id'))
                {
                    // Añade la cantidad del producto al array de productos del carrito
                    $_SESSION['shopping_cart'][$i]['Quantity'] += filter_input(INPUT_POST, 'Quantity');
                }
            }
        }
    }
    // Si no existe, creo el primer producto con un array
    else
    {
        /// [Creación 2 Array d info]
        // Creo el array con la info nueva desde el punto 0 del array y lo lleno con los valores
        $_SESSION['shopping_cart'][0] = array
            (
                'Id' => filter_input(INPUT_GET, 'Id'),
                'Name' => filter_input(INPUT_POST, 'Name'),
                'Price' => filter_input(INPUT_POST, 'Price'),
                'Quantity' => filter_input(INPUT_POST, 'Quantity')
            );
    }
}

/// Remove product!
if(filter_input(INPUT_GET, 'action') == 'delete')
{
    // Loppeará x todos los productos hasta que encuentre 1 variable q haga "GET Id"
    foreach($_SESSION['shopping_cart'] as $key => $product)
    {
        if($product['Id'] == filter_input(INPUT_GET, 'Id'))
        {
            // Elimino el artículo del carrito cuando sea igual al del "GET Id"
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    // Reinicio las keys de la sesión del array para actualizar el carrito
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

/// [Checkout] Reset products!
if(filter_input(INPUT_GET, 'action') == 'checkout')
{
    session_destroy();
    header("Location:Thanks.php");
}
/// [LogOut] Reset products!
if(filter_input(INPUT_GET, 'action') == 'logout')
{
    session_destroy();
    header("Location:Login.php");
}


// [Comprobación] Función para mostrar el array de una forma más ordenada 
/*
pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
*/
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
                </ul>              
            </nav>
        </header>
        <!-- Info -->
        <main>            
            <section>
                <h1>Products!</h1>
                <img class="picture1" src="./Img/Products/Lounge.jpg" alt="">
            </section>
            <section>
                <img class="picture2" src="./Img/Products/Lounge2.jpg" alt="">
                <!-- Form ==> Enlaza al php d añadir al carro -->
                <article class="productsArticle">                    
                    <div class="product">
                        <?php
                            // Conexión
                            include('dataBase.php');
                            // Examino la tabla de productos
                            $query = 'SELECT * FROM products ORDER by Id ASC';
                            // Consulta
                            $result = mysqli_query($connection, $query);

                            // Disposición x pantalla de los productos
                            if($result != null)
                            {
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($product = mysqli_fetch_array($result))
                                    {
                                        //print_r($product);
                                        ?>
                                            <!-- Formulario ==> Expositorios d los productos -->
                                            <form class="col-sm-4 col-md-3" method="post" action="Products.php?action=add&Id=<?php echo $product['Id'];?>">
                                                <div class="products">
                                                    <img src="<?php echo $product['Image']; ?>" class="img-responsive"/>
                                                    <h4 class="text-info"><?php echo $product['Name']; ?></h4>
                                                    <h4><?php echo $product['Price']; ?> €</h4>
                                                    <input type="text" name="Quantity" class="form-control" value="1" />
                                                    <input type="hidden" name="Name" class="form-control" value="<?php echo $product['Name']; ?>" />
                                                    <input type="hidden" name="Price" class="form-control" value="<?php echo $product['Price']; ?>" />
                                                    <input type="submit" name="add_to_cart" class="btn btn-info" value="Add to Cart"/>
                                                </div>
                                            </form>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <br>
                        <table class="table">
                            <!-- INFO tablas usadas -->
                            <!-- tr == [Bootstrap]TableResponsive = tabla responsive (& El contenido de las columnas que están dentro de la fila lo podemos alínear tanto horizontal como verticalmente)--> 
                            <!-- td ==> celdas que van dentro de cada fila -->
                            <!-- th ==> admiten los mismos atributos que las etiquetas <td> y funcionan de la misma forma, salvo que el contenido que esté dentro de 
                                            una etiqueta <th> está considerado como el encabezado de la tabla, por lo que se creará en negrita y centrado sin que nosotros se lo 
                                            indiquemos. -->
                            <th><h3>Order Details</h3></th>
                            <tr>
                                <th width="40%">Product Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total</th>
                                <th width="5%">Action</th>
                            </tr>
                            <?php
                            // Si el carrito está vacío pongo el dinero de la compra total de todos los objetos
                            if(!empty($_SESSION['shopping_cart']))
                            {
                                $total = 0;
                                // Para todos los objetos dentro del array establezco: nombre, cantidad & precio
                                foreach($_SESSION['shopping_cart'] as $key => $product)
                                {
                                    ?>
                                    <!-- Productos, costes & cantidades de cada 1 -->
                                    <tr>
                                        <td><?php echo $product['Name']; ?></td>
                                        <td><?php echo $product['Quantity']; ?></td>
                                        <td><?php echo $product['Price']; ?> €</td>
                                        <!-- Muestra x pantalla ==> Coste total de cada objeto -->
                                        <td><?php echo number_format($product['Quantity'] * $product['Price'], 2); ?> €</td>
                                        <!-- Botón "Remove" -->
                                        <td>
                                            <a href="Products.php?action=delete&Id=<?php echo $product['Id']; ?>">
                                            <div class="btn-danger">Remove</div>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php
                                        // Cálculo del total según la cantidad de objetos introducida y sus precios
                                        $total = $total + ($product['Quantity'] * $product['Price']);
                                }        
                                ?>
                                <!-- Muestra x pantalla ==> Coste total de todos los objetos en conjunto-->
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td><?php echo number_format($total, 2); ?> €</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <!-- Checkout/Comprar -->
                                    <td colspan="5">
                                        <?php
                                            // Reviso si el carrito está lleno & si tiene más d 0 productos para mostrar el botón d Checkout al usuario
                                            if(isset($_SESSION['shopping_cart']))
                                            {
                                                if(isset($_SESSION['shopping_cart']) > 0)
                                                {
                                                    ?>
                                                    <form action="Products.php?action=checkout"  method="POST">
                                                        <a href="#"><input type="submit" name="Checkout" value="Checkout"></a>
                                                    </form>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
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