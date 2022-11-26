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
        
    case 'listar_home':
        $mascotas = new mascotas();
        $listado = $mascotas->lista_home();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;
    
    
        case 'consultar':
            $mascota = new mascotas();
            $mascota->consultar($datos['codigo']);
    
            if ($mascota->getId() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe',
                );
            } else {
                $respuesta = array(
                    'codigo' => $mascota->getId(),
                    'id_fundacion' => $mascota->getId_fundacion(),
                    'nombre' => $mascota->getNombre(),
                    'descripcion' => $mascota->getDescripcion(),
                    'edad' => $mascota->getEdad(),
                    'tipo' => $mascota->getTipo(),
                    'raza' => $mascota->getRaza(),
                    'url_imagen' => $mascota->getURL_imagen(),
                    'estado' => $mascota->getEstado(),
                    'activo' => $mascota->getActivo(),
                    'respuesta' => 'existe',
                );
            }
            echo json_encode($respuesta);
            break;

            case 'cambiar_estado':
                $mascota = new mascotas();
                $resultado = $mascota->cambiar_estado($datos['codigo']);
                $respuesta = array(
                    'respuesta' => $resultado
                );
                echo json_encode($respuesta);
                break;

}