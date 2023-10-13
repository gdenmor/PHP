<?php
    require_once 'respositorios/repositorio_producto.php';
    $producto=Repositorio_producto::FindAll();

    for ($i=0;$i<count($producto);$i++){
        echo "ID: ".$producto[$i]->getID();
        echo "<br>";
    }




?>