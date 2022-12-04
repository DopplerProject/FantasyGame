<?php

    require_once "../dao/PlayerDAO.php";

    class Player{

        // Atributos da classe \\
        private $pro_cod;
        private $pro_nickname;
        private $pro_dtNasc;
        private $pro_nome;

        

        // Getters e Setters \\
        public function getPro_cod(){
            return $this->pro_cod;
        }
        public function setPro_cod($e){
            $this->pro_cod = $e;
        }
        public function getPro_nickname(){
            return $this->pro_nickname;
        }
        public function setPro_nickname($e){
            $this->pro_nickname = strtoupper(trim($e));
        }
        public function getPro_dtNasc(){
            return $this->pro_dtNasc;
        }
        public function setPro_dtNasc($e){
            $this->pro_dtNasc = strtolower(trim($e));
        }
        public function getPro_nome(){
            return $this->pro_nome;
        }
        public function setPro_nome($e){
            $this->pro_nome = trim($e);
        }
    }
?>