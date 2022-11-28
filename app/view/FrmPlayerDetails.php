<?php
    require_once "../util/MySqlConnection.php";
    $conection = new ConectionDatabase();

    $usu_cod = $_GET["cd"];
    $player_cd = $_GET["player"];
    $sql = mysqli_query(
        $conection->conectDatabase(),
        "SELECT pro_nickname,
                org_cod,
                org_desc,
                org_pais,
                pro_nome,
                pro_dtNasc,
                pro_valor,
                pro_cod
         FROM tb_player
         INNER JOIN rl_player_organizacao USING(pro_cod)
         INNER JOIN tb_organizacao ON org_cod = pro_time
         WHERE pro_cod =" . $player_cd . ";"
    );
    $res = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../product/css/style.css" rel="stylesheet">
        <!-- Aba do navegador -->
        <title><?php echo($res["pro_nickname"]) ?></title>
    </head>
    <body>
        <div class="container">
            <div class="player-info"
                <?php

                    echo('<div class="player-name">' . $res["pro_nickname"] . '</div>');
                    echo('<div class="player-nome">' . $res["pro_nome"] . '</div>');
                    echo('<img class="team-logo" src="../../product/images/icons_teams/' . $res["org_cod"] . '.png">');
                    echo('<img class="players-photo" src="../../product/images/players_photos/' . $res["pro_cod"] . '.png">');
                    echo('<div class="player-value">' . 'R$' . number_format($res["pro_valor"], 2, ',', '.') . '</div>');
                    echo('<a href="../controller/LineUpController.php?cd='. $usu_cod . '&player=' . $player_cd . '"><div class="button-select-player">ESCALAR</div></a>');
                    echo('<a href="../view/FrmLineup.php?cd=' . $usu_cod . '"<div class="button-cancel">CANCELAR</div></a>')
            
                ?>
                
            </div>
        </div>
    </body>
</html>