<?php

require_once "modelo_conexion.php";

class users extends ModeloConexionDB
{


    public function nuevo($datos = array())
    {

        session_start();
        date_default_timezone_set('America/Bogota');

        $password = $this->generarpass(trim($datos['password']));

        $this->query = "SELECT * FROM users where email='" . trim($datos['email']) . "' OR username='" . trim($datos['user']) . "'";
        $this->obtener_resultados_query();
        $resultado = $this->rows;

        if (empty($resultado)) {

            if ($datos['usertype'] == 3) {

                $this->query = "SELECT * FROM fundaciones where nit='" . trim($datos['nit']) . "'";
                $this->obtener_resultados_query();
                $resultado_fundacion = $this->rows;


                if (empty($resultado_fundacion)) {


                    $file = $_FILES["logo"]["name"][0]; //Nombre de nuestro archivo

                    $url_temp = $_FILES["logo"]["tmp_name"][0]; //Ruta temporal a donde se carga el archivo 

                    //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
                    $url_insert =  "../../../macak/public/img/fundaciones"; //Carpeta donde subiremos nuestros archivos

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





                    $this->query =  'INSERT INTO `fundaciones`(`id`, `nit`, `nombre`, `descripcion`, `direccion`, `telefono`, `numero_cuenta`, `URL_imagen`, `tipo_cuenta`) 
                    VALUES (null,"' . trim($datos['nit']) . '","' . trim($datos['name']) . '","' . trim($datos['descripcion']) . '","' . trim($datos['direccion']) . '"," "," ","' . $url_img . '"," ")';
                    $resultado = $this->ejecutar_query_simple_register();
                    
                    if (!empty($resultado)) {
                        $id_fundacion = $this->conexion->lastInsertId();
                        
                    } else {
                        $id_fundacion = null;
                    }
                } else {

                    $id_fundacion = $resultado_fundacion[0]['id'];
                }
            } else {
                $id_fundacion = null;
            }

            $this->query = "INSERT INTO `users` 
            (`name`,`username`, `password`, `email`, `direccion`, `user_type`, `id_fundacion`, `state`) 
             VALUES 
             ('" . $datos['name'] . "', '" . trim($datos['user']) . "', '$password', '" . trim($datos['email']) . "', '" . trim($datos['direccion']) . "','" . $datos['usertype'] . "','$id_fundacion', '1');";


            $resultado = $this->ejecutar_query_simple();
            // 
            return array('result' => $resultado, 'error' => '0');
        } else {
            return array('result' => 'Ya existe un usuario con ese nombre u correo electrónico', 'error' => '1');
        }
    }
    public function login($usuario)
    {
        $this->query = "SELECT * FROM users a WHERE a.username = '$usuario' and a.state ='1'	";

        $this->obtener_resultados_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) :
                $this->$propiedad = $valor;
            endforeach;
            return $this->rows[0];
        } else {
            return false;
        }
    }
    public function consultar($datos = array())
    {
    }
    public function editar($datos = array())
    {

        session_start();
        date_default_timezone_set('America/Bogota');

        $password = $this->generarpass(trim($datos['password']));

        $this->query = "UPDATE `users` SET 
             `password`='$password', `direccion`='" . trim($datos['direccion']) . "' where id= '" . trim($datos['id_usuario']) . "'";


        $resultado = $this->ejecutar_query_simple();

        if ($resultado != false && $resultado == 1) {

            $result = $this->login($datos['username']);
            // session_start();
            $_SESSION['username'] = $datos['username'];
            $_SESSION['user_type'] = $result['user_type'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['direccion'] = $result['direccion'];
            $_SESSION['id_fundacion'] = $result['id_fundacion'];
            $_SESSION['id_usuario'] = $result['id'];
            $_SESSION['pass'] = $datos['password'];

            return array('result' => $resultado, 'error' => '0');
        } else {
            return array('result' => $resultado, 'error' => '1');
        }
    }



    function generarpass($pass)
    {
        $opciones = [
            'cost' => 12,
        ];

        $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);

        return ($passwordHashed);
    }
}
