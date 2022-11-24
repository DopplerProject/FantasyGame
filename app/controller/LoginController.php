<?php
    require_once "../model/LoginSystem.php";
    require_once "../util/Password.php";
    require_once "../util/Data.php";

    //--- Coletando as informações de login ---\\
    $data = new Data();
    $password = new Password();
    $user = strtoupper($data->tirarCaracteresEspeciais($_POST["login_input"]));
    $pass = $password->cryptography($password->setPassword($_POST["password_input"]));
    // Verificando o tipo de info para login \\
    if(strpos($user, "@") == true){
        $type = "email";
    }else if(is_numeric($user)){
        $type = "fone";
    } else{
        $type = "user";
    }
    
    
    $loginSystem = new LoginSystem();
    $login = $loginSystem->loginSystem($type, $user, $pass);
    if($login["flag"] === true){
        header("Location: ../view/FrmMainPage.php?cd=" . $login["usu_cod"]);
        die();
    }else{
        header("Location: ../view/FrmLogin.php?msg=1");
        die();  
    }
?>