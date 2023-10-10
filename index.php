<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="login.php?imagen=<?php echo $nombreArchivo=isset($_FILES['Archivo']['tmp_name'])?$_FILES['Archivo']['tmp_name']:"";?>">
        <h1> INICIAR SESIÓN</h1>
        <br>
        <label> Usuario </label>
        <br>
        <input type="text" name="usuario">
        <br>
        <br>
        <label> Contraseña </label>
        <br>
        <input type="password" name="contrasenia">
        <br>
        <br>
        <label> Foto: </label>
        <br>
        <br>
        <input type="file" name="Archivo">
        <br>
        <br>
        <input type="submit" value="INICIAR SESIÓN" name="boton">
        <input type="submit" value="REGISTRARSE" name="registro">
    </form>
</body>
</html>