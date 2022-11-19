<?
include_once ('modelo_conexion.php');

Class Usuarios extends ModeloConexionDB{



function nuevo($datos=array()){

        session_start();
        date_default_timezone_set('America/Bogota');
       
        $password=$this->generarpass($datos['password']);

        $this->query="INSERT INTO `users` 
        (`name`,`username`, `password`, `email`, `usertype`, `estado`) 
         VALUES 
         ('".$datos['name']."', '".$datos['user']."', '$password', '".$datos['usertype']."', '1');";

        
        $resultado=$this->ejecutar_query_simple();
        // 
        return $resultado;

}
function consultar(){

}
function editar(){
    
}



function generarpass($pass){
    $opciones = [
        'cost' => 12,
    ];
   
    $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);

    return ($passwordHashed);
}



}

?>