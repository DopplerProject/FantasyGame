<?php

    require_once "../util/MySqlConnection.php";
    require_once "../dao/usuarioDAO.php";
    require_once "../dao/escalacaoDAO.php";

    $conection = new ConectionDatabase();
    $usuarioDAO = new UsuarioDAO();
    $escalacaoDAO = new EscalacaoDAO();
    $jogadorSelecionado = new EscalacaoDAO();

    $usu_cod = $_GET["cd"];
    $player_cd = $_GET["player"];

    $usuarioDAO->list($usu_cod);
    $escalacaoDAO->list($esc_usuario = $usuarioDAO->getUsu_cod());
    $jogadorSelecionado->list($player_cd);


    // Jogadores ja escalados \\
    

    // Jogador selecionado \\
    

    // SALDO INSUFICIENTE \\
    if($usuarioDAO->getUsu_money() ){
        header("Location: ../view/FrmLineUp.php?cd=" . $usu_cod . "msg=1");
    } else{

    }

?>