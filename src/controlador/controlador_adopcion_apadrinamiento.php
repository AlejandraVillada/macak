<?php
require_once "../Modelo/modelo_adopcion_apadrinamiento.php";
header('Content-Type: application/json');
$datos = $_GET; //datos 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_GET['accion']) {

    case 'listar':
        $mascotas = new mascotas();
        $listado = $mascotas->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;
    


}