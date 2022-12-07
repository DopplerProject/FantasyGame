<?php

    $usu_cod = $_GET["cd"];
    $player = $_GET["player"];

    require_once "../dao/PlayerDAO.php";
    require_once "../dao/PlayerOrganizacaoDAO.php";
    require_once "../dao/OrganizacaoDAO.php";
    
    

    $playerDAO = new PlayerDAO();
    $res = $playerDAO->list($player);

    $playerOrganizacaoDAO = new PlayerOrganizacaoDAO();
    $resPlayerOrg = $playerOrganizacaoDAO->list($player);

    $organizacaoDAO = new OrganizacaoDAO();
    $resOrg = $organizacaoDAO->list($resPlayerOrg["pro_time"]);

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
                    echo('<img class="team-logo" src="../../product/images/icons_teams/' . $resOrg["org_cod"] . '.png">');
                    echo('<img class="players-photo" src="../../product/images/players_photos/' . $res["pro_cod"] . '.png">');
                    echo('<div class="player-value">' . 'R$' . number_format($resPlayerOrg["pro_valor"], 2, ',', '.') . '</div>');
                    echo('<a href="../controller/LineUpController.php?cd='. $usu_cod . '&player=' . $player . '"><div class="button-select-player">ESCALAR</div></a>');
                    echo('<a href="../view/FrmLineup.php?cd=' . $usu_cod . '"<div class="button-cancel">CANCELAR</div></a>')
            
                ?>
                
            </div>
        </div>
    </body>
</html>