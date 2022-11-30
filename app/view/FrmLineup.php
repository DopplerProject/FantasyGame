<?php
    $usu_cod = $_GET["cd"];
    $msg = $_GET["msg"];

    switch($msg){
        case 1:
            echo('<div class="mensage saldo-insuficiente">SALDO INSUFICIENTE</div>');
            break;
    }
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
        <title>Escalação</title>
    </head>
    <body>
        <div class="container">
            <div id="players-card">
                <table id="c">
                    <th id="players-table-header">
                        <h1>JOGADORES PARA ESCALAÇÃO</h1>
                    </th>
                    <div id="players-lines">
                        <!-- LISTAGEM DINÂMICA DOS JOGADORES -->
                        <?php

                            require_once "../util/MySqlConnection.php";

                            $conection = new ConectionDatabase();
                            // Seleção da quebra dos times \\
                            $sql = mysqli_query(
                                $conection->conectDatabase(),
                                "SELECT pro_time FROM rl_player_organizacao GROUP BY pro_time;"
                            );
                            while($teams = mysqli_fetch_assoc($sql)){
                                $players = mysqli_query(
                                    $conection->conectDatabase(),
                                    "SELECT tp.pro_cod,
                                            tp.pro_nickname,
                                            rlpo.pro_valor
                                     FROM rl_player_organizacao rlpo
                                         INNER JOIN tb_player tp ON tp.pro_cod = rlpo.pro_cod
                                     WHERE pro_time = " . $teams["pro_time"] . ";"
                                );
                                echo('<tr class="player-row">');
                                while($player = mysqli_fetch_assoc($players)){
                                    // Listando os jogadores dinamicamente por time\\
                                    echo('<td class="player-colunm player-card">');
                                        echo('<a href="../view/FrmPlayerDetails.php?cd=' . $usu_cod . '&player=' . $player["pro_cod"] . '">');
                                            echo('<div class="player-name">' . $player["pro_nickname"] . '</div>');
                                            echo('<img class="team-logo" src="../../product/images/icons_teams/' . $teams["pro_time"] . '.png">');
                                            echo('<img class="players-photo" src="../../product/images/players_photos/' . $player["pro_cod"] . '.png">');
                                            echo('<div class="player-value">' . 'R$' . number_format($player["pro_valor"], 2, ',', '.') . '</div>');
                                        echo('</a>');
                                        echo('<a href="../controller/LineUpController.php?cd='. $usu_cod . '&player=' . $player["pro_cod"] . '"><div class="button-select-player">ESCALAR</div></a>');
                                    echo('</td>');
                                }
                                echo('</tr>'); 
                            }
                        ?>

                        
                        
                        
                        
                    </div>
                </table>
                <a href="../view/FrmMainPage.php?cd=<?php echo($usu_cod) ?>">
                    <div class="button">VOLTAR</div>
                </a>
            </div>
        </div>
    </body>
</html>