<?php

    require_once "../util/ConexaoMySql.php";
    require_once "../dao/UsuarioDAO.php";
    require_once "../dao/escalacaoDAO.php";
    require_once "../model/Usuario.php";

    $conexao = new ConexaoMySql();
    $usuarioDAO = new UsuarioDAO();
    $escalacaoDAO = new EscalacaoDAO();
    $playerSelecionado = new EscalacaoDAO();

    $usu_cod = $_GET["cd"];
    $player_cd = $_GET["player"];

    $usuarioDAO->list($usu_cod);
    $escalacaoDAO->list($esc_usuario = $usuario->);
    $jogadorSelecionado->list($player_cd);


    // Jogadores ja escalados \\
    

    // Jogador selecionado \\
    

    // SALDO INSUFICIENTE \\
    if($usuarioDAO->getUsu_money() ){
        header("Location: ../view/FrmLineUp.php?cd=" . $usu_cod . "msg=1");
    } else{

    }



    require_once "../util/ConexaoMySql.php";

    $conection = new ConexaoMySql();
    // Seleção da quebra dos times \\
    $sql = mysqli_query(
        $conection->estabelecerConexao(),
        "SELECT pro_time FROM rl_player_organizacao GROUP BY pro_time;"
    );
    while($teams = mysqli_fetch_assoc($sql)){
        $players = mysqli_query(
            $conection->estabelecerConexao(),
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
