<?php
// comprueba que el usuario haya abierto sesion o redirige
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="src/components/header.js"></script>
    <script src="src/components/footer.js"></script>
    <title>Tabla de productos por categoria</title>
</head>
<header-component></header-component>
<body>
    <?php
    require 'cabecera.php';
    $cat = cargar_categoria($_GET['categoria']);
    $productos = cargar_productos_categoria($_GET['categoria']);
    if ($cat === FALSE or $productos === FALSE) {
        echo "p class='error'> Error al conectar con la base de datos</p>";
        exit;
    }
    echo "<h1>" . $cat['nombre'] . "</h1>";
    echo "<p>" . $cat['descripcion'] . "</p>";
    echo "<table class='table'>"; //abrir la tabla
    echo "<tr><th>Nombre</th><th>Descripcion</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";
    foreach ($productos as $producto) {
        $cod = $producto['CodProd'];
        $nom = $producto['Nombre'];
        $des = $producto['Descripcion'];
        $peso = $producto['Peso'];
        $stock = $producto['Stock'];
        echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td><td>
        <form action = 'anadir.php' method = 'POST'>
        <input name = 'unidades' type='number' min = '1'value = '1'>
        <input type = 'submit' value='Comprar'>
        <input name = 'cod' type='hidden' value = '$cod'>
        </form>
        </td>
        </tr>";
    }
    echo "</table>"
    ?>

<footer-component></footer-component>
</body>

</html>