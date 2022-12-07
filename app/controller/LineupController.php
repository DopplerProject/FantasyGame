<?php

    $usu_cod = $_GET["cd"];
    $player_cod = $_GET["player"];

    require_once "../dao/PlayerDAO.php";
    require_once "../dao/PlayerOrganizacaoDAO.php";
    require_once "../dao/EscalacaoDAO.php";
    require_once "../model/Player.php";
    require_once "../model/PlayerOrganizacao.php";
    require_once "../model/Escalacao.php";
 
    $playerDAO = new PlayerDAO();
    $playerOrganizacaoDAO = new PlayerOrganizacaoDAO();
    $escalacaoDAO = new EscalacaoDAO();
    $player = new Player();
    $playerOrganizacao = new PlayerOrganizacao();
    $escalacao = new Escalacao();

    $values = $playerDAO->list($player_cod);
    $player->setPro_cod($values["pro_cod"]);
    $player->setPro_dtNasc($values["pro_dtNasc"]);
    $player->setPro_nickname($values["pro_nickname"]);
    $player->setPro_nome($values["pro_nome"]);

    $values = $playerOrganizacaoDAO->list($player_cod);
    $playerOrganizacao->setPro_cod($values["pro_cod"]);
    $playerOrganizacao->setPro_seq($values["pro_seq"]);
    $playerOrganizacao->setPro_time($values["pro_time"]);
    $playerOrganizacao->setPro_valor($values["pro_valor"]);
   
    $escalacaoDAO->create(
        1,
        $usu_cod,
        $player_cod,
        1,
        1
    );
    



?>