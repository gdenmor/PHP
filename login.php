<?php
    require_once 'funciones.php';
    require_once 'funcioneslogin.php';
    require_once 'session.php';
    require_once 'usuario.php';

    $usuario=$_POST['usuario'];
    $password=$_POST['contrasenia'];
    //$error=(isset($_GET['error'])?$_GET['error']:"");
    $registrarse=isset($_POST['registro']);
    //$archivo=isset($_POST['Archivo'])?$_POST['Archivo']:"";
    //$nombreArchivo=isset($_FILES['Archivo']['name'])?$_FILES['Archivo']['name']:"";
    //$dirSubida = 'C:/xampp/htdocs/manolo_apruebame/imagenes/';
    //$contenido=file_get_contents($dirSubida.$_FILES['Archivo']['name']);
    //$contenidostxt=base64_encode($contenido);
    $rol=isset($_POST['rol'])?$_POST['rol']:"";



    if ($registrarse){
        header("Location: registro.php");
    }
    if (isset($_POST['boton'])){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            if(CompruebaUsuario($usuario,$password,'users.csv')==true){
                Login($usuario,'logueados.csv');
                $user=new Usuario($usuario,$password,$rol);
                iniciaSesion('user',$user);
                header('Location: http://localhost/manolo_apruebame/formu.php');
            }else{
                header('Location: index.php');
            }
        }
    }



?>