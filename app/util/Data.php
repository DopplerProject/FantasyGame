<?php
    class Data
    {
        public function tirarCaracteresEspeciais($texto){
            return str_replace(array("(", ")", "-", ".", " ", "/"), '', $texto);
        }
    }
?>