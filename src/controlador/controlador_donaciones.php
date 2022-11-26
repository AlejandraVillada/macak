<?php
require_once "../Modelo/modelo_donaciones.php";
header('Content-Type: application/json');
$datos = $_GET; //datos 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_GET['accion']) {
    
    case 'donar':
        $donacion = new donaciones();
        $resultado = $donacion->nuevo($datos);
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
            );
        }
        echo json_encode($respuesta);
        break;

        
}