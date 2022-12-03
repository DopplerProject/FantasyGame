
<?php

    require_once "../dao/UsuarioDAO.php";

    class LoginSystem
    {
        public function loginSystem($typeUser, $user, $pass){  // typeUser é a flag que mostra se a pessoa loga com e-mail, usuario ou telefone
            $usuarioDAO = new UsuarioDAO();
            // Checando de o usuário existe \\
            switch($typeUser){
                case "user":
                    $usuarioDAO->list($usu_cod = "", $usu_nickname = $user, $usu_email="", $usu_celular="");
                    if($user <> $usuarioDAO->getUsu_nickname()){
                        return false;
                    }
                    break;
                case "email":
                    $usuarioDAO->list($usu_cod = "", $usu_nickname="", $usu_email = $user, $usu_celular="");
                    if($user <> $usuarioDAO->getUsu_email()){
                        return false;
                    }
                    break;
                case "fone":
                    $usuarioDAO->list($usu_cod = "", $usu_nickname="", $usu_email="", $usu_celular = $user);
                    if($user <> $usuarioDAO->getUsu_celular()){
                        return false;
                    }
                    break;
                default:
                    return "TIPO DE LOGIN INVÁLIDO";
            }
            // Checando se a senha é igual \\
            if($pass == $usuarioDAO->getUsu_senha()){
                return array("flag" => true, "usu_cod" => $usuarioDAO->getUsu_cod());  // Senha correta
            } else{
                return false;  // Senha incorreta
            }
        }
    }

?>