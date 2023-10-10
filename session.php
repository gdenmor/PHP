<?php
    require_once 'funcioneslogin.php';
    function iniciaSesion($clave,$valor){
        session_start();
        $_SESSION[$clave]=$valor;
    }

    function leer_session($clave) {
        $usuario=$_SESSION[$clave];
        return $usuario;
    }

    function Cerrar_Sesion() {
        if (isset($_SESSION['user'])){
            session_destroy();
            header("Location: http://localhost/PHP/index.php");
        }
    }

    function CreaSesion() {
        session_start();
    }



?>