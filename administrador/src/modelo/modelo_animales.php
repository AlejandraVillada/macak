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
        
        $file = trim($_FILES["url_img"]["name"][0]); //Nombre de nuestro archivo

        $url_temp = $_FILES["url_img"]["tmp_name"][0]; //Ruta temporal a donde se carga el archivo 

        //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
        $url_insert =  "../../../public/img/animales"; //Carpeta donde subiremos nuestros archivos

        //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
        $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

        //Si la carpeta no existe, la creamos
        if (!file_exists($url_insert)) {
            mkdir($url_insert, 0777, true);
        };

        //movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
        if (move_uploaded_file($url_temp, $url_target)) {
            // echo "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
            $url_img =   $file;
        } else {
            // echo "Ha habido un error al cargar tu archivo.";
            $url_img =   '';
        }
        $this->query = "INSERT INTO `pets` (`id_fundacion`, `nombre`, `descripcion`, `edad`, `tipo`, `raza`, `URL_imagen`, `estado`, `activo`)
        values 
         ( '" . $_SESSION['id_fundacion'] . "', '" . $datos['name'] . "', '" . $datos['descripcion'] . "', 
         '" . $datos['edad'] . "', '" . $datos['tipo'] . "', '" . $datos['raza'] . "', 
        '$url_img',  'pendiente_publicacion', '1')";

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
    function consultar_ind($id_fundacion, $id_animal)
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
        
       
        $this->query = "UPDATE `pets` SET
            `nombre`='" . $datos['name'] . "', `descripcion`='" . $datos['descripcion'] . "', `edad`='" . $datos['edad'] . "', `tipo`='" . $datos['tipo'] . "',
         `raza`='" . $datos['raza'] . "',  `activo`='" . $datos['estado'] . "' 
         WHERE id='" . $datos['id'] . "'";

        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
}
