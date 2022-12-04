<?php
    $msg = $_GET["msg"];
    if($msg <> 'null'){
        switch($msg){
            case "1":
                $msg = "LOGIN INVÁLIDO";
                break;
            case "2":
                $msg = "OPS! ALGO DEU ERRADO! CONTATE O SUPORTE! ERRO 101"; 
                break;
            case "3":
                $msg = "SENHA INVÁLIDA!";
                break;
        }
        echo '<span id="mensage-login" class="mensage">' . $msg . '</span>';
    }
?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Links -->
        <link href="../../product/css/style.css" rel="stylesheet">
        <script src="../../product/js/Form.js"></script>
        <!-- Aba Navegador -->
        <title>Login</title>
    </head>
    <body>
        
        <div class="container">
            <div id="div-form-login"> 
                <form id="form-login" action="../controller/LoginController.php" method="POST" autocomplete="off"">
                    <table id="table-login" class="table">
                        <th id="login-header">
                            <!-- HEADER FROM LOGIN FORM -->
                        </th>
                        <tr class="table-row login-row">
                            <td class="login-data column">
                                <label class="login-label">USER:</label>
                            </td>
                            <td class="login-data column">
                                <input type="text" name="login_input" id="login-input" class="login-input inputbox" required>
                            </td>
                        </tr>
                        <tr class="table-row login-row">
                            <td class="login-data login-ow">
                                <label class="login-label">PASSWORD:</label>
                            </td>
                            <td class="login-data login-ow">
                                <input type="password" name="password_input" id="password-input" class="password-input inputbox" required>
                            </td>
                        </tr>
                        
                        <tfoot id="login-footer">
                            <!-- FOOTER FROM LOGIN FORM -->
                            <tr class="table-row login-row">
                                <input id="btn_login" class="btn" type="submit" name="action_button" value="LOGIN"/>
                                <label class="login-label"> NÃO POSSUÍ CONTA? ENTÃO <a href="FrmRegistration.php?msg=null">CADASTRE-SE</a> AQUI</label>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>