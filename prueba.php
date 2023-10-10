<?php
    require_once 'usuario.php';

    $usuario=new Usuario("Pepe","1234","Estudiante");


    $json= json_encode($usuario);

    $decode=json_decode($json,true);

    



?>