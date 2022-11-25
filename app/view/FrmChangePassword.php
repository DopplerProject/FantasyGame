<?php

    require_once "../util/Password.php";

    $usu_cod = $_GET["cd"];
    $msg = $_GET["msg"];
    
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
        <title>Troca de Senha</title>
    </head>
    <body>
        <div class="container">
            <div id="div-form-password">
                <form id="form-password" action="../controller/ChangePasswordController.php" method="POST" autocomplete="off">
                    <th id="password-header">
                        <!-- CABEÇALHO DO FORMULÁRIO -->
                    </th>
                    <tr class="table-row password-row">
                        <td class="password-data column">
                            <label class="password-label">SENHA ATUAL:</label>
                        </td>
                        <td class="password-data column">
                            <input type="password" name="usu_password" class="password-input inputbox">
                        </td>
                    </tr>
                    <tr class="table-row password-row">
                        <td class="password-data column">
                            <label class="password-label">NOVA SENHA:</label>
                        </td>
                        <td class="password-data column">
                            <input type="password" name="new_password" class="password-input inputbox">
                        </td>
                    </tr>
                    <tr class="table-row password-row">
                        <td class="password-data column">
                            <label class="password-label">REPITA A SENHA:</label>
                        </td>
                        <td class="password-data column">
                            <input type="password" name="repeat_password" class="password-input inputbox"
                                src="../controller/ChangePasswordController.php?cd=<?php echo($usu_cod) ?>">
                        </td>
                    </tr>
                    <input class="button sabe-btn" type="submit" value="SALVAR">
                </form>
                <a href="../view/FrmProfile.php?msg=null&cd=<?php echo($usu_cod) ?>">
                    CANCELAR
                </a>
            </div>
        </div>
    </body>
</html>