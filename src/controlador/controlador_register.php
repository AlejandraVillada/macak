<?php
include_once __DIR__ . "/../modelo/modelo_register.php";
header('Content-Type: application/json');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$accion = recibe_variables('action');


switch ($accion) {

    case 'new_user':
        $Usuarios = new users();

        $data = $_POST;
        $respuesta = $Usuarios->nuevo($data);
        echo json_encode(array('data' => $respuesta), JSON_UNESCAPED_UNICODE);
        break;
}

function recibe_variables($nombre)
{
    if (isset($_GET[$nombre])) {
        return $_GET[$nombre];
    } else if (isset($_POST[$nombre])) {
        return $_POST[$nombre];
    } else {
        return '';
    }
}
