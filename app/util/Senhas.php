<?php
    class Senhas
    {
        private $password;

        // Verifica força da senha \\
        function checkPassword(){
            if(strlen($this->password) >= 8){
               return true;  // Senha forte
            } else{
                return false;  // Senha fraca
            }
        }
        // Criptografa a senha
        public function cryptography(){
            return md5(trim($this->password));
        }
        // Setter
        public function setPassword($e){
            $this->password = trim($e);
        }
    }
?>