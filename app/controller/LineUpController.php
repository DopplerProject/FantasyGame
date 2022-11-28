<?php

    require_once "../util/MySqlConnection.php";
    $conection = new ConectionDatabase();

    $usu_cod = $_GET["cd"];
    $player_cd = $_GET["player"];

    // Saldo do jogador \\
    $sql = mysqli_query(
        $conection->conectDatabase(),
        "SELECT usu_money FROM tb_usuario WHERE usu_cod = '$usu_cod';"
    );
    $saldo = mysqli_fetch_assoc($sql);

    // Jogadores ja escalados \\
    $sql = mysqli_query(
        $conection->conectDatabase(),
        "SELECT esc_playerEscalado, esc_sequencia
         FROM tb_escalacao
         WHERE esc_usuario = '$usu_cod';"
    );
    $escalados = mysqli_fetch_assoc($sql);

    // Jogador selecionado \\
    $sql = mysqli_query(
        $conection->conectDatabase(),
        "SELECT pro_valor FROM tb_player WHERE pro_cod = '$player_cd';"
    );
    $player = mysqli_fetch_assoc($sql);

?>