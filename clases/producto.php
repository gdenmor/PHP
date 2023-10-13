<?php
    class Producto{
        private $id;

        public function getID(){
            return $this->id;
        }

        public function setID($id){
            return $this->id=$id;
        }

        public function __construct($id){
            $this->setID($id);
        }

    }


?>