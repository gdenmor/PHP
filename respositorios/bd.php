<?php
    class Bd{
        private static $conexion=null;

        public static function AbreConexion(){
            if (BD::$conexion==null){
                $conexion=new PDO("mysql:host=localhost;dbname=hola","root","Root");
            }

            return $conexion;
        }
    }

?>