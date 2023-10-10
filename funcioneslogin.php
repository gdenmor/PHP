<?php
require_once "funciones.php";
function CompruebaUsuario($usuario,$password,$ruta) {
    $datos=leeCSV('users.csv');

    $existe=false;

    foreach ($datos as $valor) {
            if ($valor[0]===$usuario&&$valor[1]===$password){
                $existe=true;
            }
    }


    return $existe;
}



function EstaLogueado($usuario,$ruta) {
    $datos=leeCSV($ruta);

    $existe=false;

    foreach ($datos as $valor) {
            if ($valor[0]===$usuario){
                $existe=true;
            }
    }

    return $existe;
}

function Login($usuario,$ruta) {
    $datos=leeCSV($ruta);
    $si=[$usuario];
    guardaCSV($si,$ruta,"a");
}


function Logout($usuario,$ruta,$forma) {
    $datos=leeCSV($ruta);
    //abre el archivo
    $archivo = fopen($ruta,$forma); 
    $existe=false;
    if ($archivo !== false) {
        //recorro el archivo
        foreach ($datos as $indice => $linea) {
            // Verifica si el primer elemento de la línea (el nombre de usuario) coincide con el usuario a eliminar
            if (trim($linea[0]) === $usuario) {
                $existe=true;
                break; // Rompe el bucle después de encontrar y eliminar el usuario
            }
        }
    }
    
    if ($existe==true){
        borrarDatoCSV($ruta,$usuario);
    }
}

function CreaUsuario($nombre,$contrasenia,$nombreArchivo,$ruta){
    $datos=leeCSV($ruta);
    $nuevos=[$nombre,$contrasenia,$nombreArchivo];
    guardaCSV($nuevos,$ruta,"a");
}


?>