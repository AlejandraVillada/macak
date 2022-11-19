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

        if ($fundacion->getIdFundacion() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $fundacion->getIdFundacion(),
                'nit' => $fundacion->getNit(),
                'nombre' => $fundacion->getNombreFundacion(),
                'descripcion' => $fundacion->getDescripcion(),
                'direccion' => $fundacion->getDireccion(),
                'telefono' => $fundacion->getTelefono(),
                'numero_cuenta' => $fundacion->getNumeroCuenta(),
                'tipo_cuenta' => $fundacion->getTipoCuenta(),
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
