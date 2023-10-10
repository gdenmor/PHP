<?php
    require_once 'funcioneslogin.php';
    require_once 'session.php';
    CreaSesion();
    $usuario=leer_session('user')[0];

    $password = leer_session('user')[1];

    $rol=leer_session('user')[2];

    //$ruta='C:/xampp/htdocs/manolo_apruebame/imagenes/';
    //$ruta=$ruta.$nombreTemp;

    //esto es con las imágenes
    //$contenido=file_get_contents($ruta);
    //$txt=base64_encode($contenido);

    //echo "<img style='float: right' width=20% height=20% src='data:image/png;base64,$txt'>";

    //indica tipo de archivo que se quiere abrir
    //header('Content-type: application/pdf');

    //indica que se quiere abrir en una ventana nueva
    //header('Content-Disposition: inline; filename="' . $ruta . '"');

    //readfile($ruta);

    if (EstaLogueado($usuario,'logueados.csv')==false){
        header("Location: index.php");
    }

    /*$i=isset($_COOKIE['Usuarios'])?1:0;


    $i++;

    setcookie("Usuarios", $i, time() + 3600);
    $conectado=isset($_COOKIE['Tiempo'])?$_COOKIE['Tiempo']:"";

    echo "Hola " . $usuario . ", esta es tu visita número " . $i. " "."Hora de conexión: ".$conectado;*/

    $id=isset($_POST['ID'])? $_POST['ID']:"";
    $nombre=isset($_POST['NOMBRE'])? $_POST['NOMBRE']:"";
    $nuevo=isset($_POST['aniadir']);
    $borrar=isset($_POST['borrar']);
    $modificar=isset($_POST['modificar']);
    $muestra=isset($_POST['muestra']);
    $cerrarsesion=isset($_POST['cerrar']);

    if ($nuevo){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            //lee el array
            $array=leeCSV('datos.csv');

            //extraemos los datos a procesar del formulario
            $datos=[$id,$nombre];

            $existe=false;

            foreach ($array as $fila) {
                //comprobamos que el id es distinto (Se compara a nivel de fila)
                if ($fila[0]==$id){
                    $existe=true;
                    break;
                }
            }


            if ($existe==false){
                guardaCSV($datos,'datos.csv',"a");
            }else{
                echo "Error";
            }
        }
    }


    if ($borrar){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $csv=leeCSV('datos.csv');
            $existe=false;
            foreach ($csv as $key => $fila) {
                if ($fila[0]==$id){
                    $existe=true;
                    break;
                }else{
                    echo "No es posible borrar ya que este id no existe";
                }
            }

            if ($existe==true){
                borrarDatoCSV('datos.csv',$id);
            }
        }
    }

    if ($modificar){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $datoscambio=[$id,$nombre];
            modificaCSV($datoscambio,'datos.csv',$id);
            
        }
    }


    if ($muestra){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $datos=leeCSV('datos.csv');
            muestraCSV($datos);
        }
    }

    if ($cerrarsesion){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            borrarDatoCSV('logueados.csv',$usuario);
            Cerrar_Sesion();
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="formu.php">
        <input style="float: right;" type="submit" value="CERRAR SESIÓN" name="cerrar">
        <label> ID </label>
        <input type="text" name="ID">
        <br>
        <br>
        <label> Nombre </label>
        <input type="text" name="NOMBRE">
        <br>
        <br>
        <input type="submit" value="+" name="aniadir">
        <input type="submit" value="-" name="borrar">
        <input type="submit" value="MODIFY" name="modificar">
        <input type="submit" value="MUESTRA" name="muestra">
    </form>
</body>
</html>