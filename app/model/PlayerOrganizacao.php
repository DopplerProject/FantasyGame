<?php

    require_once "../dao/PlayerOrganizacaoDAO.php";

    class PlayerOrganizacao{

        // Atributos da classe \\
        private $pro_cod;
        private $pro_seq;
        private $pro_time;
        private $pro_valor;

        

        // Getters e Setters \\
        public function getPro_cod(){
            return $this->pro_cod;
        }
        public function setPro_cod($e){
            $this->pro_cod = $e;
        }
        public function getPro_seq(){
            return $this->pro_seq;
        }
        public function setPro_seq($e){
            $this->pro_seq = strtoupper(trim($e));
        }
        public function getPro_time(){
            return $this->pro_time;
        }
        public function setPro_time($e){
            $this->pro_time = strtolower(trim($e));
        }
        public function getPro_valor(){
            return $this->pro_valor;
        }
        public function setPro_valor($e){
            $this->pro_valor = trim($e);
        }
    }
?>