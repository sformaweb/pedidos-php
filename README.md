



## Notas e consideracións

* Creación dunha aplicación de pedidos e control de stock para restaurantes seguindo o capítulo 4 do libro.

* Consta dun inicio de sesión, unha sección de productos onde podemos seleccionar categorías e, dentro das mesmas, seleccionar os productos en si. Estes engadiranse ao carriño, dende onde se poderá efectuar o pedido. Unha vez feito, debería enviarase un correo automáticamente con axuda de PHPMailer á dirección coa que o usuario iniciou sesión.

* Instalouse mediante a consola PHPMailer, o framework de CSS Bootstrap e o manexador de paquetes npm.

* Para engadir Bootstrap enlazouse un dos arquivos CSS do cartafol vendor>bootstrap>dist>css e engadíronselle novos estilos para adaptalos á aplicación en cuestión.

* O header e o footer común a todas as páxinas engadíronse como compoñentes JavaScript.

  > __Importante__
  >
  > No arquivo procesar_pedido.php foi necesario cambiar a liña 3 con "require 'correo.php'", en lugar da dirección que traía o código por defecto.
  >
  > De igual xeito, no arquivo bd.php hai que cambiar a liña 56 con "select codCat, nombre, descripcion..." (engadir a variable nombre).





![ex1](src\capturas\ex2.png)

![ex1](src\capturas\ex1.png)

![ex1](src\capturas\ex3.png)

![ex1](src\capturas\ex4.png)