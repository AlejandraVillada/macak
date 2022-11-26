<?php
include_once __DIR__ . "/../modelo/modelo_user.php";
header('Content-Type: application/json');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$accion = recibe_variables('action');


switch ($accion) {

   
    case 'login':
        $Usuarios = new users();
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $resultado = $Usuarios->login($user);
        if (password_verify($pass, $resultado['password'])) {
            session_start();

            $_SESSION['username'] = $user;
            $_SESSION['user_type'] = $resultado['user_type'];
            $_SESSION['name'] = $resultado['name'];
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['direccion'] = $resultado['direccion'];
            $_SESSION['id_fundacion'] = $resultado['id_fundacion'];
            $_SESSION['pass'] = $pass;
            // var_dump($_SESSION);
            $respuesta = array(
                'respuesta' => 'existe',
                'user_type'=>$resultado['user_type']
            );
        } else {
            $respuesta = array(
                'respuesta' => 'no existe',
                'user_type'=>''
            );
        }
        // var_dump($respuesta);

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

        break;
}

function recibe_variables($nombre)
{
    if (isset($_GET[$nombre])) {
        return $_GET[$nombre];
    } else if (isset($_POST[$nombre])) {
        return $_POST[$nombre];
    } else {
        return '';
    }
}
