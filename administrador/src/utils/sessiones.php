<?php
    function usuarioAutenticado(){
        if(!verificarUsuario()){ 
            // header("location: https://archivosiw.com/Bailatino/login.php");
            exit();
           
        }
    }
    function verificarUsuario(){
        return isset($_SESSION["username"]);
    }
    session_start();
    usuarioAutenticado();

?>