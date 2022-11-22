<?php

    require_once "../util/MySqlConnection.php";
    require_once "../util/SqlConditions.php";

    $usu_cod = $_POST["usu_cod"];
    $conection = new ConectionDatabase();
    $condition = new SqlConditions();
    $condition->setFields(array("usu_cod" => $usu_cod));

    $query = mysqli_query(
        $conection->conectDatabase(),
        "SELECT usu_nickname,
                usu_email,
                usu_celular
         FROM tb_usuario" . $condition->generateSqlConditions()
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
                             value="
                                <?php echo($usu_cod); ?>
                             ">
                        </td>
                        <td class="espace"></td>
                        <td class="profile-data column">
                            <label class="profile-label">NICKNAME:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_nickname" class="profile-input inputbox"
                             value="
                                <?php echo($usu_nickname); ?>
                             ">
                        </td>
                    </tr>
                    <tr class="table-row profile-row">
                        <td class="profile-data column">
                            <label class="profile-label">E-MAIL:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_email" class="profile-input inputbox" disabled
                             value="
                                <?php echo($usu_email); ?>
                             ">
                        </td>
                        <td class="espace"></td>
                        <td class="profile-data column">
                            <label class="profile-label">CELULAR:</label>
                        </td>
                        <td class="profile-data column">
                            <input type="text" name="usu_celular" class="profile-input inputbox"
                             value="
                                <?php echo($usu_celular); ?>
                             ">
                        </td>
                    </tr>
                </form>
            </div>
        </div>
    </body>
</html>