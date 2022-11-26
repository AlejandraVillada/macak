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
        // var_dump($resultado);
        if (empty($resultado)) {

            if ($datos['usertype'] == 3) {

                'INSERT INTO `fundaciones`(`id`, `nit`, `nombre`, `descripcion`, `direccion`, `telefono`, `numero_cuenta`, `URL_imagen`, `tipo_cuenta`) 
                VALUES (null,'.trim($datos['nit']).','.trim($datos['name']).','.trim($datos['descripcion']).','.trim($datos['direccion']).',null,null,'.$url_img.',null)'
            }

            $this->query = "INSERT INTO `users` 
            (`name`,`username`, `password`, `email`, `direccion`, `user_type`, `state`) 
             VALUES 
             ('" . $datos['name'] . "', '" . trim($datos['user']) . "', '$password', '" . trim($datos['email']) . "', '" . trim($datos['direccion']) . "','" . $datos['usertype'] . "', '1');";


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
