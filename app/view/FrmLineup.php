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

                            
                        ?>1

                        
                        
                        
                        
                    </div>
                </table>
                <a href="../view/FrmMainPage.php?cd=<?php echo($usu_cod) ?>">
                    <div class="button">VOLTAR</div>
                </a>
            </div>
        </div>
    </body>
</html>