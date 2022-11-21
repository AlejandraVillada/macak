<?php



if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == true) {
    session_start();
    session_destroy();
      header('location: index.php');
}
// include_once __DIR__ . '/src/utils/sessiones.php';







include_once('templates/header.php');

include_once('src/vistas/home.php');



include_once('templates/footer.php');
