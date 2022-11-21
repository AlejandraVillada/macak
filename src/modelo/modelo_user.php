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
    public function editar()
    {
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
