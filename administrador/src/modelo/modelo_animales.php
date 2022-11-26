<?php
include_once __DIR__ . '/modelo_conexion.php';

class Animales extends ModeloConexionDB
{


    function __construct()
    {
    }
    function nuevo($datos = array())
    {
        session_start();
        $date = date('Y-m-d');
        
        $this->query = "INSERT INTO `pets` (`id_fundacion`, `nombre`, `descripcion`, `edad`, `tipo`, `raza`, `URL_imagen`, `estado`, `activo`)
        values 
         ( '" . $_SESSION['id_fundacion'] . "', '" . $datos['name'] . "', '" . $datos['descripcion'] . "', 
         '" . $datos['edad'] . "', '" . $datos['tipo'] . "', '" . $datos['raza'] . "', 
         '',  'pendiente_publicacion', '1')";

        // var_dump($this->query);
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    function consultar($id_fundacion)
    {
        $this->query = "SELECT A.*,B.nombre nombre_fundacion FROM pets A INNER JOIN fundaciones B ON (A.id_fundacion=B.id)
        where b.id='$id_fundacion'";
        $this->obtener_resultados_query();
        $resultado = $this->rows;
        return $resultado;
    }
    function consultar_ind($id_fundacion,$id_animal)
    {
        $this->query = "SELECT A.*,B.nombre nombre_fundacion FROM pets A INNER JOIN fundaciones B ON (A.id_fundacion=B.id)
        where b.id='$id_fundacion' and a.id='$id_animal'";
        $this->obtener_resultados_query();
        $resultado = $this->rows;
        return $resultado;
    }
   
    
    
    function editar($datos = array())
    {

        session_start();
        // $date= date('Y-m-d');
        $fecha_nacimiento = date('Y-m-d', strtotime($datos['fecha_nac']));
        //    echo $fecha_nacimiento;
        $trat_datos = '';
        if (!empty($datos['tratamiento_datos'])) {
            $trat_datos = 'Ok';
        }
        $this->query = "UPDATE `pets` SET
            `nombre`='" . $datos['name'] . "', `descripcion`='" . $datos['descripcion'] . "', `edad`='" . $datos['edad'] . "', `tipo`='" . $datos['tipo'] . "',
         `raza`='" . $datos['raza'] . "',  `estado`='" . $datos['estado'] . "' 
         WHERE id='" . $datos['id'] . "'";

        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }


}