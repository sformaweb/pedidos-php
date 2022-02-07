<?php
// comprueba que el usuario haya iniciado sesión o redirige
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="src/components/header.js"></script>
    <script src="src/components/footer.js"></script>
    <title>Lista de Categorías</title>
</head>
<header-component></header-component>
<body>
    <?php
    require 'cabecera.php'; ?>
    <h1>Lista de categorías</h1>
    <!-- lista de vínculos con la forma productos.php?categoria=1 -->

    <?php

    $categorias = cargar_categorias();
    if ($categorias === FALSE) {
        echo "<p class='error'>Error al conectar con la base de datos</p>";
    } else {
        echo "<ul >";
        foreach ($categorias as $cat) {
            // $cat['nombre'] $cat['codCat']
            $url = "productos.php?categoria=" . $cat['codCat'];
            echo "<li class='lista'><a href='$url'>" . $cat['nombre'] . "</a></li>";
        }

        echo "</ul>";
    }

    ?>

<footer-component></footer-component>

</body>

</html>