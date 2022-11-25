<?php

    require_once "../util/MySqlConnection.php";
    require_once "../util/SqlConditions.php";

    $usu_cod = $_GET["cd"];
    $msg = $_GET["msg"];

    $conection = new ConectionDatabase();
    $condition = new SqlConditions();
    $condition->setFields(array("usu_cod" => $usu_cod));

    $query = mysqli_query(
        $conection->conectDatabase(),
        "SELECT usu_nickname,
                usu_email,
                usu_celular
         FROM tb_usuario " . $condition->generateSqlConditions()
    );

    $res = mysqli_fetch_assoc($query);
    $usu_nickname = $res["usu_nickname"];
    $usu_email = $res["usu_email"];
    $usu_celular = $res["usu_celular"];

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
        <title>Perfil</title>
        <!-- SCRIPTS PARA MÁSCARAS NOS CADASTROS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div id="div-form-profile">
                <form id="form-profile" action="../controller/ProfileController.php" method="POST" autocomplete="off">
                    <th id="profile-header">
                        <!-- CABEÇALHO DO FORMULÁRIO -->
                    </th>
                    <tr class="table-row profile-row">
                        <td class="profile-data column">
                            <label class="profile-label">CÓDIGO DO USUÁRIO:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_cod" class="profile-input inputbox" disabled
                             value="<?php echo(trim($usu_cod)); ?>">
                        </td>
                        <td class="espace"></td>
                        <td class="profile-data column">
                            <label class="profile-label">NICKNAME:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_nickname" class="profile-input inputbox"
                             value="<?php echo(trim($usu_nickname)); ?>">
                        </td>
                    </tr>
                    <tr class="table-row profile-row">
                        <td class="profile-data column">
                            <label class="profile-label">E-MAIL:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="email" name="usu_email" class="profile-input inputbox" disabled
                             value="<?php echo($usu_email); ?>">
                        </td>
                        <td class="espace"></td>
                        <td class="profile-data column">
                            <label class="profile-label">CELULAR:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_celular" class="profile-input inputbox"
                             value="<?php echo($usu_celular); ?>" onkeypress="$(this).mask('(00) 00000-0000')">
                        </td>
                    </tr>
                    <input class="button sabe-btn" type="submit" value="SALVAR">
                </form>
                <a href="../view/FrmChangePassword.php?msg=null&cd=<?php echo($usu_cod) ?>">
                    ALTERAR A SENHA
                </a>
                <br>
                <a href="../view/FrmMainPage.php?cd=<?php echo($usu_cod) ?>">
                    CANCELAR
                </a>
            </div>
        </div>
    </body>
</html>