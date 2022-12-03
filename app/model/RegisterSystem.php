<?php

    require_once "../dao/UsuarioDAO.php";

    class RegisterSystem
    {
        public function registrationSystem($user, $email, $fone, $pass){
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->list($usu_cod="", $usu_nickname=$user);
            // CHECANDO SE AS INFORMAÇÕES JÁ ESTÃO CADASATRADAS \\
            if($usuarioDAO->getUsu_nickname() <> null){
                return 2;  // "NICKNAME JÁ CADASTRADO!"
            }
            $usuarioDAO->list($usu_cod="", $usu_nickname="", $usu_email=$email);
            if($usuarioDAO->getUsu_email() <> null){
                return 3;  // "E-MAIL JÁ CADASTRADO!"
            }
            $usuarioDAO->list($usu_cod="", $usu_nickname="", $usu_email="", $usu_celular = $fone);
            if($usuarioDAO->getUsu_email() <> null){
                return 4;  // "TELEFONE JÁ CADASTRADO!"
            }
            // REALIZANDO O CADASTRO \\
            $usuarioDAO->setUsu_nickname($user);
            $usuarioDAO->setUsu_email($email);
            $usuarioDAO->setUsu_celular($fone);
            $usuarioDAO->setUsu_senha($pass);
            $usuarioDAO->create();
            return 0;  // "CADASTRADO REALIZADO COM SUCESSO"
        }
    }

?>