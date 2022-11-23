<?php
require_once "../Modelo/modelo_solicitud.php";
header('Content-Type: application/json');
$datos = $_GET; //datos 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_GET['accion']) {
    
    case 'guardar_solicitud':
        $solicitud = new solicitudes();
        $resultado = $solicitud->nuevo($datos);
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