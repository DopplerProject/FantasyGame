<?php

    require_once "../dao/UsuarioDAO.php";
    require_once "../model/Usuario.php";
    require_once "../util/Data.php";
    require_once "../util/Senhas.php";

    $usuarioDAO = new UsuarioDAO();
    $usuario = new Usuario();
    $data = new Data();
    $password = new Senhas();

    $login = strtoupper(trim($_POST["login_input"]));
    $password->setPassword($_POST["password_input"]);


    // Identificando o tipo de login utilizado \\
    if(is_numeric($login) AND strlen($login) == 11){
        $query = $usuarioDAO->list("", "", "", $login);
    } else if(str_contains($login, "@")){
        $query = $usuarioDAO->list("", "", $login);
    } else {
        $query = $usuarioDAO->list("", $login);
    }

    if(is_array($query)){
        // Salvando o resultado na query no objeto do usuário
        $usuario->setUsu_cod($query["usu_cod"]);
        $usuario->setUsu_nickname($query["usu_nickname"]);
        $usuario->setUsu_email($query["usu_email"]);
        $usuario->setUsu_celular($query["usu_celular"]);
        $usuario->setUsu_senha($query["usu_senha"]);
        $usuario->setUsu_money($query["usu_money"]);
        // Conferindo a senha
        if($usuario->loginSistema($login, $password->cryptography())){ // Senha correta
            header("Location: ../view/FrmMainPage.php?cd=" . $usuario->getUsu_cod());
        } else {  // Senha incorreta
            header("Location: ../view/FrmLogin.php?msg=3");
        }
    } else {  // Consulta falhou
        if($query == "FORAM ENCONTRADOS MAIS DE UM REGISTRO COM ESTAS INFORMAÇÕES"){
            header("Location: ../view/FrmLogin.php?msg=2");
        } else if($query == "CONSULTA VAZIA"){
            header("Location: ../view/FrmLogin.php?msg=1");
        }
    }
?>