<?php

    // Inclusão do DAO que será utilizado \\
    require_once "../app/dao/UsuarioDAO.php";
    $testeDAO = new UsuarioDAO();

    // TESTE DO CREATE \\
    $testeDAO->create(
        "USUARIO TESTE",
        "teste@teste.com",
        "19999999999",
        "senhaTeste",
        100
    );

    // TESTE LIST \\
    $testeList = $testeDAO->list("", "USUÁRIO TESTE");
    $tamanhoArray = sizeof($testeList);
    echo("TAMANHO DO ARRAY: " . $tamanhoArray . "<br>");
    echo("<br>CAMPO usu_cod, VALOR: " . $testeList["usu_cod"]);
    echo("<br>CAMPO usu_nickname, VALOR: " . $testeList["usu_nickname"]);
    echo("<br>CAMPO usu_email, VALOR: " . $testeList["usu_email"]);
    echo("<br>CAMPO usu_celular, VALOR: " . $testeList["usu_celular"]);
    echo("<br>CAMPO usu_senha, VALOR: " . $testeList["usu_senha"]);
    echo("<br>CAMPO usu_money, VALOR: " . $testeList["usu_money"]);

    // TESTE UPDATE \\
    $testeDAO->update(
        1,
        "OUTRO TESTE",
        "NEW TESTE",
        "new@new.com",
        "33333333333",
        "senhaboa123",
        500
    );

    // TESTE LIST \\
    $testeList = $testeDAO->list(1);
    echo("<br>CAMPO usu_cod, VALOR: " . $testeList["usu_cod"]);
    echo("<br>CAMPO usu_nickname, VALOR: " . $testeList["usu_nickname"]);
    echo("<br>CAMPO usu_email, VALOR: " . $testeList["usu_email"]);
    echo("<br>CAMPO usu_celular, VALOR: " . $testeList["usu_celular"]);
    echo("<br>CAMPO usu_senha, VALOR: " . $testeList["usu_senha"]);
    echo("<br>CAMPO usu_money, VALOR: " . $testeList["usu_money"]);

    // TESTE DELETE \\
    $testeDAO->delete(1);

?>