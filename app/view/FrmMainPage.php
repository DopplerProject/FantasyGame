<?php
    $usu_cod = $_GET["cd"];
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
        <title>Login</title>
        <script src="../../product/js/Form.js"></script>
    </head>
    <body>
        <h1>PÁGINA PRINCIPAL</h1>
        <a href="../view/FrmProfile.php?cd=<?php echo($_GET["cd"]);?> ">
            MEU PERFIL
        </a>
    </body>
</html>