<?php
    function leeCSV($fichero){
        $datos=[];
        //abrimos el archivo
        $archivo=fopen($fichero,"r");
        if ($archivo!==false){
            //obtenemos las filas y las metemos en el array
            while (($fila=fgetcsv($archivo,0))!==false) {
                $datos[]=$fila;
            }
            fclose($archivo);
        }else{
            echo("No se ha podido leer el archivo CSV");
        }
        return $datos;
    }


    function guardaCSV($datos,$ruta,$forma){
        //archivo de forma recursiva
        $archivo=fopen($ruta,$forma);
        $datoscsv=leeCSV($ruta);
        //entramos al archivo
        if ($archivo!==false){
            //añade la linea con un for each
            if (in_array($datos,$datoscsv)){
                
            }else{
                fputcsv($archivo, $datos);
                fclose($archivo);
            }
            
        }else{
            echo "No se ha podido leer el archivo";
        }
    }

    function borrarDatoCSV($ruta,$id) {
        //leemos el csv
        $datos=leeCSV($ruta);

        //recorre el array del csv
        foreach ($datos as $clave=>$fila) {
            if ($fila[0]===$id){
                array_splice($datos,$clave,1);
                guardaCSV($datos,$ruta,"w");
            }
        }

    }

    function muestraCSV($datos) {
        foreach ($datos as $dato) {
            foreach ($dato as $valor) {
                echo $valor;
            }
        }
    }

    function modificaCSV($datoaModificar,$ruta,$id) {
        $datos=leeCSV($ruta);

        $existe=false;

        foreach ($datos as $key=>$fila) {
            if ($fila[0]===$id){
                $existe=true;
                unset($datos[$key]);
                break;
            }
        }

        if ($existe==true){
            guardaCSV($datoaModificar,$ruta,"w");
        }
        
    }


?>