<?php
require_once 'bd.php';
// formulario de login habitual. Si va bien abre la sesión, guarda el nombre de usuario
//  y redirige a principal.php. Si va mal, mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
if($usu===FALSE){
    $err = TRUE;
    $usuario = $_POST['usuario'];
    }else{
        session_start();
        // $usu tiene campos correo y codRes, correo
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        header("Location: categorias.php");
        return;
    }
}
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
    <title>Formulario de login</title>
</head>
<header-component></header-component>
<body>
<h1>Inicia a sesión</h1>

<?php if (isset($_GET["redirigido"])){
    echo "<p>Haga login para continuar</p>";
} ?>
<?php if (isset($err) and $err == TRUE){
    echo "<p>Revise usuario y contraseña</p>";
}?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="usuario">Usuario</label>
    <input value = "<?php if(isset($usuario))echo $usuario;?>"
    id="usuario" name="usuario" type="text">
    <label for = "clave">Clave</label>
    <input id="clave" name="clave" type="password">
    <input type="submit">
</form>
<footer-component></footer-component>
</body>
</html>