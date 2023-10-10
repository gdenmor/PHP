<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="login.php">
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
        <label> Rol: </label>
        <br>
        <br>
        <input type="text" name="rol">
        <input type="submit" value="INICIAR SESIÓN" name="boton">
        <input type="submit" value="REGISTRARSE" name="registro">
    </form>
</body>
</html>