<?php

    require "../app/util/Password.php";
    $pass = new Password();
    $pass->setPassword('JBAVgahAJBSAO3223@#');
    echo($pass->checkPassword());
?>