<!--<?php
    /*$msg = $_GET["msg"];
    if ($msg <> 'null') {
        switch ($msg) {
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
    } */
?> -->

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links -->
    <!-- <link href="../../product/css/style.css" rel="stylesheet"> -->
    <!-- Aba Navegador -->
    <title>Cadastro</title>
    <script src="../../product/js/Form.js"></script>

    <!-- Template CSS Importações /Daniel -->
    <link rel="icon" type="image/x-icon" href="../../product/template/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../product/template/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../../product/template/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../product/template/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../product/template/css/demo.css" />

    <link rel="stylesheet" href="../../product/template/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../product/template/vendor/css/pages/page-auth.css" />

    <!-- Template JS Importações /Daniel -->
    <script src="../../product/template/vendor/js/helpers.js"></script>

    <script src="../../product/template/js/config.js"></script>

    <script src="../../product/template/vendor/libs/jquery/jquery.js"></script>
    <script src="../../product/template/vendor/libs/popper/popper.js"></script>
    <script src="../../product/template/vendor/js/bootstrap.js"></script>
    <script src="../../product/template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../product/template/vendor/js/menu.js"></script>
    <script src="../../product/template/js/main.js"></script>
    <!-- SCRIPTS PARA MÁSCARAS NOS CADASTROS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <?php
                    $msg = $_GET["msg"];
                    if ($msg <> 'null') {
                        switch ($msg) {
                            case 0:
                                $msg = "Cadastro realizado com sucesso!";
                                break;
                            case "1":
                                $msg = "Senha muito fraca!";
                                break;
                            case "2":
                                $msg = "Nickname já cadastrado!";
                                break;
                            case "3":
                                $msg = "E-mail já cadastrado!";
                                break;
                            case "4":
                                $msg = "Telefone já cadastrado!";
                                break;
                            case "5":
                                $msg = "Telefone Inválido!";
                                break;
                        }
                        echo '<div id="mensage-login" class="alert alert-primary alert-dismissible mensage" role="alert">' . $msg . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
                    }
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Seja bem-vindo(a)!</h4>
                        <p class="mb-4">Entre com seus dados para cadastrar um login:</p>

                        <form id="formAuthentication" class="mb-3" action="../controller/RegistrationController.php" method="POST" autocomplete="off">
                            <div class="mb-3">
                                <label for="email" class="form-label">USER:</label>
                                <input type="text" class="form-control" name="user_input" id="user_input-input" placeholder="Digite o USER" autofocus required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email_input" id="email_input" placeholder="Digite o Email" autofocus required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Telefone:</label>
                                <input type="phone" class="form-control" name="fone_input" id="user_input-input" placeholder="Digite o Telefone" autofocus onkeypress="$(this).mask('(00) 00000-0000')" required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">PASSWORD:</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password_input" id="password-input" class="form-control" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Cadastrar</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Já possui conta?</span>
                            <a href="FrmLogin.php?msg=null">
                                <span>Faça login por aqui</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Mantendo caso necessário /Daniel
    <div class="container">
        <div id="div-form-login">
            
            <form id="form-registration" action="../controller/RegistrationController.php" method="POST" autocomplete="off">
                    <table id=" table-login" class="table">
                <th id="login-header">
                    <!-- CABEÇALHO BONITO Q VAI APARECER NUM TOQUE DE MÁGICA 
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
                    
                    <tr class="table-row login-row">
                        <input id="btn_login" class="btn" type="submit" name="action_button" value="CADASTRO" />
                        <label class="login-label"> JÁ POSSUÍ CONTA? ENTÃO FAÇA <a href="FrmLogin.php?msg=null">LOGIN</a> AQUI</label>
                    </tr>
                </tfoot>
                </table>
            </form>
        </div>
    </div> -->
</body>

</html>