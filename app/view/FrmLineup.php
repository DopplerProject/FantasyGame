<?php
$usu_cod = $_GET["cd"];
$msg = $_GET["msg"];

switch ($msg) {
    case 1:
        echo ('<div class="mensage saldo-insuficiente">SALDO INSUFICIENTE</div>');
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
    <!-- <link href="../../product/css/style.css" rel="stylesheet"> -->
    <link rel="icon" type="image/x-icon" href="../../product/template/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Template CSS Importações /Daniel -->
    <link rel="stylesheet" href="../../product/template/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../../product/template/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../product/template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../product/template/css/demo.css" />
    <link rel="stylesheet" href="../../product/template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../product/template/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Aba Navegador -->
    <title>Escalação</title>

    <!-- Template JS Importações /Daniel -->
    <script src="../../product/js/Form.js"></script>
    <script src="../../product/template/vendor/js/helpers.js"></script>
    <script src="../../product/template/js/config.js"></script>
    <script src="../../product/template/vendor/libs/jquery/jquery.js"></script>
    <script src="../../product/template/vendor/libs/popper/popper.js"></script>
    <script src="../../product/template/vendor/js/bootstrap.js"></script>
    <script src="../../product/template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../product/template/vendor/js/menu.js"></script>
    <script src="../../product/template/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../product/template/js/main.js"></script>

</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                    <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                    <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                    <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                </defs>
                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                <g id="Path-3" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                </g>
                                                <g id="Path-4" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                </g>
                                            </g>
                                            <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Doppler</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <li class="menu-item">
                        <a href="../view/FrmMainPage.php?msg=null&cd=<?php echo ($_GET["cd"]); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Página Inicial</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

                    <li class="menu-item">
                        <a href="../view/FrmProfile.php?msg=null&cd=<?php echo ($_GET["cd"]); ?> " class="menu-link">
                            <i class="bx bx-user me-2 menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Meu Perfil</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="../view/FrmLineup.php?cd=<?php echo ($_GET["cd"]) . '&  msg=null' ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Escalar Jogadores</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jogadores /</span> Escalação
                        <a href="../view/FrmMainPage.php?cd=<?php echo ($usu_cod) ?>" class="btn btn-secondary" style="float: right;">
                            <div class="button">VOLTAR</div>
                        </a>
                    </h4>

                    <?php

                    require_once "../util/ConexaoMySql.php";

                    $conection = new ConexaoMySql();

                    $sql = mysqli_query(
                        $conection->estabelecerConexao(),
                        "SELECT pro_time FROM rl_player_organizacao GROUP BY pro_time;"
                    );

                    while ($teams = mysqli_fetch_assoc($sql)) {
                        $players = mysqli_query(
                            $conection->estabelecerConexao(),
                            "SELECT tp.pro_cod,
                                                    tp.pro_nickname,
                                                    rlpo.pro_valor
                                             FROM rl_player_organizacao rlpo
                                                 INNER JOIN tb_player tp ON tp.pro_cod = rlpo.pro_cod
                                             WHERE pro_time = " . $teams["pro_time"] . ";"
                        );
                        echo ('<div class="row mb-4">');

                        while ($player = mysqli_fetch_assoc($players)) {
                            echo ('<div class="col-md-6 col-lg-4 mb-3">
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <a href="../view/FrmPlayerDetails.php?cd=' . $usu_cod . '&player=' . $player["pro_cod"] . '"> 
                                                            <img class="card-img-top" src="../../product/images/players_photos/' . $player["pro_cod"] . '.png" alt="Card image cap" /> </a>
                                                            <div class="card-body">
                                                                <h5 class="card-title">' . $player["pro_nickname"] . '
                                                                    <img style="width: 50px; float: right; " class="card-img-top" src="../../product/images/icons_teams/' . $teams["pro_time"] . '.png" alt="Card image cap" /> 
                                                                </h5>
                                                                
                                                                <p class="card-text">
                                                                ' . 'R$' . number_format($player["pro_valor"], 2, ',', '.') . '
                                                                </p>
                                                                
                                                                <a href="../controller/LineUpController.php?cd=' . $usu_cod . '&player=' . $player["pro_cod"] . ' "  class="btn btn-primary">
                                                                    ESCALAR
                                                                </a>
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>');
                        }

                        echo ('</div>');
                    }
                    ?>

                    <!-- <div class="row mb-5">
                        
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="col">
                                <div class="card h-100">
                                    <img class="card-img-top" src="../../product/template/img/elements/13.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            This is a longer card with supporting text below as a natural lead-in to additional content.
                                            This content is a little bit longer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- LISTAGEM DINÂMICA DOS JOGADORES -->
                    <!--                     
                    <?php

                    require_once "../util/ConexaoMySql.php";

                    $conection = new ConexaoMySql();
                    // Seleção da quebra dos times \\
                    $sql = mysqli_query(
                        $conection->estabelecerConexao(),
                        "SELECT pro_time FROM rl_player_organizacao GROUP BY pro_time;"
                    );
                    while ($teams = mysqli_fetch_assoc($sql)) {
                        $players = mysqli_query(
                            $conection->estabelecerConexao(),
                            "SELECT tp.pro_cod,
                                            tp.pro_nickname,
                                            rlpo.pro_valor
                                     FROM rl_player_organizacao rlpo
                                         INNER JOIN tb_player tp ON tp.pro_cod = rlpo.pro_cod
                                     WHERE pro_time = " . $teams["pro_time"] . ";"
                        );
                        echo ('<tr class="player-row">');
                        while ($player = mysqli_fetch_assoc($players)) {
                            // Listando os jogadores dinamicamente por time\\
                            echo ('<td class="player-colunm player-card">');
                            echo ('<a href="../view/FrmPlayerDetails.php?cd=' . $usu_cod . '&player=' . $player["pro_cod"] . '">');
                            echo ('<div class="player-name">' . $player["pro_nickname"] . '</div>');
                            echo ('<img class="team-logo" src="../../product/images/icons_teams/' . $teams["pro_time"] . '.png">');
                            echo ('<img class="players-photo" src="../../product/images/players_photos/' . $player["pro_cod"] . '.png">');
                            echo ('<div class="player-value">' . 'R$' . number_format($player["pro_valor"], 2, ',', '.') . '</div>');
                            echo ('</a>');
                            echo ('<a href="../controller/LineUpController.php?cd=' . $usu_cod . '&player=' . $player["pro_cod"] . '"><div class="button-select-player">ESCALAR</div></a>');
                            echo ('</td>');
                        }
                        echo ('</tr>');
                    }

                    ?> -->


                </div>
            </div>


        </div>
    </div>

    </div>
    </div>

</body>

</html>