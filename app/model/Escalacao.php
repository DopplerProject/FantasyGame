<?php
    
    class Escalacao{
        private $esc_codigo;
        private $esc_sequencia;
        private $esc_usuario;
        private $esc_playerEscalado;
        private $esc_multiplicador;
        private $esc_periodo;

        public function getEsc_codigo(){
            return $this->esc_codigo;
        }
        public function setEsc_codigo($e){
            $this->esc_codigo = $e;
        }
        public function getEsc_sequencia(){
            return $this->esc_sequencia;
        }
        public function setEsc_sequencia($e){
            $this->esc_csequencia = $e;
        }
        public function getEsc_usuario(){
            return $this->esc_usuario;
        }
        public function setEsc_usuario($e){
            $this->esc_usuario = $e;
        }
        public function getEsc_playerEscalado(){
            return $this->esc_playerEscalado;
        }
        public function setEsc_playerEscalado($e){
            $this->esc_playerEscalado = $e;
        }
        public function getEsc_multiplicador(){
            return $this->esc_multiplicador;
        }
        public function setEsc_multiplicador($e){
            $this->esc_multiplicador = $e;
        }
        public function getEsc_periodo(){
            return $this->esc_periodo;
        }
        public function setEsc_periodo($e){
            $this->esc_periodo = $e;
        }
    }

?>