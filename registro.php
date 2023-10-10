<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Registro </h1>
    <form method="post" action="registro.php" enctype="multipart/form-data">
        <label> Usuario </label>
        <input type="text" name="nombres">
        <br>
        <br>
        <label> Contrasenia </label>
        <input type="text" name="contrasena">
        <br>
        <br>
        <label> Foto: </label>
        <input type="file" name="archivo"> 
        <br>
        <br>
        <input type="submit" name="registrar">
    </form>
</body>
</html>
<?php
    require_once "funcioneslogin.php";


    $registrar = isset($_POST['registrar']);


    if ($registrar){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $usuario=$_POST['nombres']?$_POST['nombres']:"";
            $contrasena = $_POST['contrasena']?$_POST['contrasena']:"";
            $foto =$_FILES['archivo']['name']?$_FILES['archivo']['name']:"";

            if(isset($_FILES)) {

                    $dirSubida = 'C:/xampp/htdocs/manolo_apruebame/imagenes/';
                    $ficheroSubido = $dirSubida . basename($_FILES['archivo']['name']);
                
                    $foto = file_get_contents($_FILES['archivo']['tmp_name']);
                    $foto = base64_encode($foto);

                    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ficheroSubido)) { 
                        CreaUsuario($usuario, $contrasena, $foto,'users.csv');    

                        header("Location: index.php");                       
                
                    } 
                    else {
                        echo "Archivo NO válido.\n";
                    }
        }

        }
    }


?>