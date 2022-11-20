<?php

require_once "modelo_conexion.php";

class users extends ModeloConexionDB
{


    public function nuevo($datos = array())
    {

        session_start();
        date_default_timezone_set('America/Bogota');

        $password = $this->generarpass($datos['password']);

        $this->query = "INSERT INTO `users` 
        (`name`,`username`, `password`, `email`, `user_type`, `state`) 
         VALUES 
         ('" . $datos['name'] . "', '" . $datos['user'] . "', '$password', '" . $datos['email'] . "','" . $datos['usertype'] . "', '1');";


        $resultado = $this->ejecutar_query_simple();
        // 
        return $resultado;
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
