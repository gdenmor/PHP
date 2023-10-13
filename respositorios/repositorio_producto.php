<?php
    require_once 'clases/producto.php';
    require_once 'bd.php';
    require_once 'interface.php';
    class Repositorio_producto implements BaseDeDatos{
        public static function FindByID($id)
        {
            $conexion=Bd::AbreConexion();
            $resultado=$conexion->query("SELECT * from producto");

            $id=null;

            $array=null;

            $i=0;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $producto=new Producto($id);
                $array[$i]=$producto;
                $i++;
            }

            

            return $array;
        }

        public static function FindAll()
        {
            $conexion=Bd::AbreConexion();
            $resultado=$conexion->query("SELECT * from producto");

            $id=null;

            $array=null;

            $i=0;


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $producto=new Producto($id);
                $array[$i]=$producto;
                $i++;
            }

            

            return $array;
        }

        public static function Insert($objeto)
        {
            $conexion=Bd::AbreConexion();

            $resultado=$conexion->exec("INSERT INTO producto values ($objeto->id,$objeto->nombre)");
        }

        public static function DeleteById($id)
        {
            $conexion=Bd::AbreConexion();

            $resultado=$conexion->exec("DELETE * from producto where id=$id");
            
        }

        public static function UpdateById($id,$nombre)
        {
            $conexion=Bd::AbreConexion();

            $resultado=$conexion->exec("UPDATE from producto set nombre=$nombre where id=$id");
        }



        
    }



?>