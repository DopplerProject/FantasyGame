<?php

    require_once "../dao/UsuarioDAO.php";
    require_once "../model/Usuario.php";
    require_once "../util/Senhas.php";
    require_once "../util/Data.php";

    $usuarioDAO = new UsuarioDAO();
    $usuario = new Usuario();
    $password = new Senhas();
    $data = new Data();

    // Informações preenchidas pelo usuário
    $usuario->setUsu_nickname(strtoupper(trim($_POST["user_input"])));
    $usuario->setUsu_email(strtolower(trim($_POST["email_input"])));
    $usuario->setUsu_celular($data->tirarCaracteresEspeciais(trim($_POST["fone_input"])));
    $password->setPassword(trim($_POST["password_input"]));
    $usuario->setUsu_senha($password->cryptography());
    // Valor padrão
    $usuario->setUsu_money(600);

    // Verificando se as informações já não estão em uso \\
    if(is_array($usuarioDAO->list("", $usuario->getUsu_nickname()))){
        header("Location: ../view/FrmRegistration.php?msg=2");
    } else if(is_array($usuarioDAO->list("", "", $usuario->getUsu_email()))){
        header("Location: ../view/FrmRegistration.php?msg=3");
    } else if(is_array($usuarioDAO->list("", "", "", $usuario->getUsu_celular()))){
        header("Location: ../view/FrmRegistration.php?msg=4");
    } else if(! $password->checkPassword()){  // Verificando "força" da senha
        header("Location: ../view/FrmRegistration.php?msg=1");
    } else if(strlen($usuario->getUsu_celular()) <> 11 || ! is_numeric($usuario->getUsu_celular())){
        header("Location: ../view/FrmRegistration.php?msg=5");
    } else {  // Realizando cadastro do usuário
        $usuarioDAO->create(
            $usuario->getUsu_nickname(),
            $usuario->getUsu_email(),
            $usuario->getUsu_celular(),
            $usuario->getUsu_senha(),
            $usuario->getUsu_money()
        );
        header("Location: ../view/FrmRegistration.php?msg=0");
    }



?>