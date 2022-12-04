<?php

    require_once "../dao/UsuarioDAO.php";

    class Usuario{

        // Atributos da classe \\
        private $usu_cod;
        private $usu_nickname;
        private $usu_email;
        private $usu_celular;
        private $usu_senha;
        private $usu_money;

        // Método de login \\
        public function loginSistema($usuario, $senha){
            if(  // Login por nickname, e-mail ou celular
                $usuario == $this->usu_nickname ||
                $usuario == $this->usu_email ||
                $usuario == $this->usu_celular
            ){
                if($senha == $this->usu_senha){  // Checando a senha
                    return true;
                } else {
                    return false;
                }
            } else {  // Login inválido
                return false;
            }
        }

        // Método de cadastro \\
        public function cadastroSistema(){

        }

        // Getters e Setters \\
        public function getUsu_cod(){
            return $this->usu_cod;
        }
        public function setUsu_cod($e){
            $this->usu_cod = $e;
        }
        public function getUsu_nickname(){
            return $this->usu_nickname;
        }
        public function setUsu_nickname($e){
            $this->usu_nickname = strtoupper(trim($e));
        }
        public function getUsu_email(){
            return $this->usu_email;
        }
        public function setUsu_email($e){
            $this->usu_email = strtolower(trim($e));
        }
        public function getUsu_celular(){
            return $this->usu_celular;
        }
        public function setUsu_celular($e){
            $this->usu_celular = trim($e);
        }
        public function getUsu_senha(){
            return $this->usu_senha;
        }
        public function setUsu_senha($e){
            $this->usu_senha = trim($e);
        }
        public function getUsu_money(){
            return $this->usu_money;
        }
        public function setUsu_money($e){
            $this->usu_money = trim($e);
        }
    }
?>