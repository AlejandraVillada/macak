<?php
require_once "../Modelo/modelo_fundaciones.php";
header('Content-Type: application/json');
$datos = $_GET; //datos 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_GET['accion']) {

    case 'listar':
        $fundaciones = new fundaciones();
        $listado = $fundaciones->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;


    case 'editar':
        $fundacion = new fundaciones();
        $resultado = $fundacion->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado
        );
        echo json_encode($respuesta);
        break;

    case 'nuevo':
        $fundacion = new fundaciones();
        $resultado = $fundacion->nuevo($datos);
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
    case 'borrar':
        break;
    case 'consultar':
        $fundacion = new fundaciones();
        $fundacion->consultar($datos['codigo']);

        if ($fundacion->getId() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $fundacion->getId(),
                'nit' => $fundacion->getNit(),
                'nombre' => $fundacion->getNombre(),
                'descripcion' => $fundacion->getDescripcion(),
                'direccion' => $fundacion->getDireccion(),
                'telefono' => $fundacion->getTelefono(),
                'url_imagen' => $fundacion->getURL_imagen(),
                'numero_cuenta' => $fundacion->getNumero_cuenta(),
                'tipo_cuenta' => $fundacion->getTipo_cuenta(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    // case 'listar':
    //     $cliente = new clientes();
    //     $listado = $cliente->lista();
    //     echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
    //     break;

    // case 'listar_estados':
    //     $estado = new clientes();
    //     $listado = $estado->lista_estados();
    //     echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
    //     break;


}
