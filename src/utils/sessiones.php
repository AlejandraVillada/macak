<?php
    function usuarioAutenticado(){
        if(verificarUsuario()){ 
            header("location: http://localhost/macak/macak/index.php");
            exit();
           
        }else{
           
        }
    }
    function verificarUsuario(){
        return var_dump(isset($_SESSION["username"]));
    }
    session_start();
    usuarioAutenticado();

?>