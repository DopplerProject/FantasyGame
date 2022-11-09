<?php

    // Inclusão do DAO que será utilizado \\
    require_once "../app/dao/usuarioDAO.php";

    // Instanciando a classe \\
    $objetoTeste = new UsuarioDAO();

    // Testando os métodos set \\
    $objetoTeste->setUsu_cod(3);
    $objetoTeste->setUsu_nickname("USUARIO DAO");
    $objetoTeste->setUsu_email("teste@teste.com");
    $objetoTeste->setUsu_celular("19999999999");
    $objetoTeste->setUsu_senha("testesenha");

    // Testando os métodos get \\
    echo("CÓDIGO: " . $objetoTeste->getUsu_cod() . "\n");
    echo("NICKNAME: " . $objetoTeste->getUsu_nickname() . "\n");
    echo("E-MAIL: " . $objetoTeste->getUsu_email() . "\n");
    echo("CELULAR: " . $objetoTeste->getUsu_celular() . "\n");
    echo("SENHA: " . $objetoTeste->getUsu_senha() . "\n");

    // TESTANDO CRUD \\
    $objetoTeste->create();
    $objetoTeste->setUsu_nickname("OUTRO NOME");
    $objetoTeste->update();
    $objetoTeste->list($objetoTeste->getUsu_cod());
    echo("NOVO NICKNAME: " . $objetoTeste->getUsu_nickname() . "\n");
    $objetoTeste->delete($objetoTeste->getUsu_cod());
    $objetoTeste->list($objetoTeste->getUsu_cod());

    echo("CÓDIGO: " . $objetoTeste->getUsu_cod() . "\n");
    echo("NICKNAME: " . $objetoTeste->getUsu_nickname() . "\n");
    echo("E-MAIL: " . $objetoTeste->getUsu_email() . "\n");
    echo("CELULAR: " . $objetoTeste->getUsu_celular() . "\n");
    echo("SENHA: " . $objetoTeste->getUsu_senha() . "\n");

?>