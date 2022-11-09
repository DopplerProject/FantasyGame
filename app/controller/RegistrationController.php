<?php
    require_once "../model/RegisterSystem.php";
    require_once "../util/Password.php";
    require_once "../util/Data.php";

    $data = new Data();
    $password = new Password();

    //--- Coletando as informações de login ---\\
    $user = strtoupper(trim($_POST["user_input"]));
    $email = strtoupper(trim($_POST["email_input"]));
    $telefone = $data->tirarCaracteresEspeciais($_POST["fone_input"]);
    if(strlen($telefone) < 10){
        header("Location: ../view/FrmRegistration.php?msg=5");
        die();
    }
    $password->setPassword($_POST["password_input"]);
    if($password->checkPassword($pass) == false){
        header("Location: ../view/FrmRegistration.php?msg=1");
        die();
    }
    $pass = $password->cryptography();
    

    $registerSystem = new RegisterSystem();
    $msg = $registerSystem->registrationSystem($user, $email, $telefone, $pass);
    header("Location: ../view/FrmRegistration.php?msg=" . $msg);
    die();
?>