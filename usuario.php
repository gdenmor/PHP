<?php
    class Usuario{
        private $usuario;
        private $password;
        private $rol;

        public function getUsuario(){
            return $this->usuario;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setUsuario($usuario) {
            $this->usuario=$usuario;
        }

        public function setPassword($password) {
            $this->password=$password;
        }

        public function setRol($rol) {
            $this->rol=$rol;
        }


        public function __construct($usuario,$password,$rol) {
            $this->setUsuario($usuario);
            $this->setPassword($password);
            $this->setRol($rol);

        }

    }



?>