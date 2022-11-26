<?php
include_once __DIR__.'/../modelo/modelo_animales.php';


if(!empty($_POST['action'])){
    $accion=$_POST['action'];
}if(!empty($_GET['action'])){
    $accion=$_GET['action'];
}

$animales= new Animales();
switch ($accion) {
    case 'reporte_animales':
        session_start();
        $id=$_SESSION['id_fundacion'];
        $resultado=$animales->consultar( $id);
        // var_dump($resultado);
        echo utf8_decode(json_encode(array('data'=>$resultado),JSON_UNESCAPED_UNICODE));
        break;
   
    case 'nuevo':
        $datos=$_POST;
        $resultado= $animales->nuevo($datos);
// var_dump(json_encode($resultado));
        echo json_encode($resultado);
        break;
        case 'modificar':
            $datos=$_POST;
            $resultado= $animales->editar($datos);
    // var_dump(json_encode($resultado));
            echo utf8_decode(json_encode($resultado));
            break;
    case 'consultar_animales':
        session_start();
        $id=$_SESSION['id_fundacion'];
        $resultado=$animales->consultar_ind($id,$_POST['codigo']);
        // var_dump($resultado);
        echo utf8_decode(json_encode($resultado[0]));
        break;
    default:
        # code...
        break;
}
