<?php

    $usu_cod = $_GET["cd"];

    require_once "../util/Password.php";
    require_once "../dao/usuarioDAO.php";

    $password = new Password();
    $usuarioDAO = new UsuarioDAO();

    $usuarioDAO->list($usu_cod);

    $current_password = $_POST["usu_password"];
    $new_password = $_POST["new_password"];
    $repeat_password = $_POST["repeat_password"];

    // Checando se a senha informada é igual a atual \\
    if($password->cryptography($current_password) == $usuarioDAO->getUsu_senha()){
        
    } else{
        // A senha informada não corresponde a sua senha atual
    }

?>