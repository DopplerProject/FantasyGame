<?php
    $msg = $_GET["msg"];
    if($msg <> 'null'){
        switch($msg){
            case 0:
                $msg = "CADASTRADO REALIZADO COM SUCESSO";
                break;
            case "1":
                $msg = "SENHA MUITO FRACA!";
                break;
            case "2":
                $msg = "NICKNAME JÁ CADASTRADO!";
                break;
            case "3":
                $msg = "E-MAIL JÁ CADASTRADO!";
                break;
            case "4":
                $msg = "TELEFONE JÁ CADASTRADO!";
                break;
            case "5":
                $msg = "TELEFONE INVÁLIDO!";
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
        <!-- Aba Navegador -->
        <title>Cadastro</title>
        <script src="../../product/js/Form.js"></script>
        <!-- SCRIPTS PARA MÁSCARAS NOS CADASTROS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </head>
    <body>
        
        <div class="container">
            <div id="div-form-login"> 
                <!-- CONTINUAR DAQUI -->
                <form id="form-registration" action="../controller/RegistrationController.php" method="POST" autocomplete="off"">
                    <table id="table-login" class="table">
                        <th id="login-header">
                            <!-- CABEÇALHO BONITO Q VAI APARECER NUM TOQUE DE MÁGICA -->
                        </th>
                        <tr class="table-row login-row">
                            <td class="login-data column">
                                <label class="login-label">USUÁRIO:</label>
                            </td>
                            <td class="login-data column">
                                <input type="text" name="user_input" id="user_input-input" class="login-input inputbox" required>
                            </td>
                        </tr>
                        <tr class="table-row login-row">
                            <td class="login-data column">
                                <label class="login-label">E-MAIL:</label>
                            </td>
                            <td class="login-data column">
                                <input type="email" name="email_input" id="email_input" class="login-input inputbox" required>
                            </td>
                        </tr>
                        <tr class="table-row login-row">
                            <td class="login-data column">
                                <label class="login-label">TELEFONE:</label>
                            </td>
                            <td class="login-data column">
                                <input type="text" name="fone_input" id="user_input-input" class="login-input inputbox" onkeypress="$(this).mask('(00) 00000-0000')" required>
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
                                <input id="btn_login" class="btn" type="submit" name="action_button" value="CADASTRO"/>
                                <label class="login-label"> JÁ POSSUÍ CONTA? ENTÃO FAÇA <a href="FrmLogin.php?msg=null">LOGIN</a> AQUI</label>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>