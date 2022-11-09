<?php
    require_once "../app/util/MySqlConnection.php";
    require_once "../app/util/SqlConditions.php";

    require_once "../app/model/LoginSystem.php";

    $conexao = new ConectionDatabase();
    $condition = new SqlConditions();

    $modelLogin = new LoginSystem();

    $modelLogin->loginSystem("user", "ANDRE GAY", "superSegura");

?>