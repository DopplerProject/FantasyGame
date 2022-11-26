<?php

    require_once "../util/Password.php";
    require_once "../dao/usuarioDAO.php";

    $usu_cod = $_GET["cd"];

    $passwordCurrent = new Password();
    $passwordNew = new Password();
    $passwordRepeat = new Password();
    $usuarioDAO = new UsuarioDAO();

    $usuarioDAO->list(usu_cod:$usu_cod);

    $passwordCurrent->setPassword($_POST["usu_password"]);
    $passwordNew->setPassword($_POST["new_password"]);
    $passwordRepeat->setPassword($_POST["repeat_password"]);


    // Verificando se a nova senha não é igual a anterior
    if($passwordNew->cryptography() == $usuarioDAO->getUsu_senha()){
        header("Location: ../view/FrmChangePassword.php?cd=" . $login["usu_cod"] . "&msg=SENHA IGUAL");
        die();
    } else if($passwordNew->cryptography() <> $passwordRepeat->cryptography()){  // Checando se a confirmação da nova senha corresponde
        header("Location: ../view/FrmChangePassword.php?cd=" . $login["usu_cod"] . "&msg=SENHAS DIVERGENTES");
        die();
    } else if($usuarioDAO->getUsu_senha() <> $passwordCurrent->cryptography()){
        // header("Location: ../view/FrmChangePassword.php?cd=" . $login["usu_cod"] . "&msg=SENHA INCORRETA");
        // die();
        echo("CÓDIGO: " . $usuarioDAO->getUsu_cod());
        echo("NICKNAME: " . $usuarioDAO->getUsu_nickname());
        echo("E-MAIL: " . $usuarioDAO->getUsu_email());
        echo("CELULAR: " . $usuarioDAO->getUsu_celular());
        echo("SENHA: " . $usuarioDAO->getUsu_senha());
    } else{
        header("Location: ../view/FrmChangePassword.php?cd=" . $usu_cod . "&msg=SENHA ALTERADA");
        die();
    }

?>  