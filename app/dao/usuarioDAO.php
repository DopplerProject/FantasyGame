<?php

    /* 
        INFORMAÇÕES DO DATA ACESS OBJECT (DAO):
            -> DATABASE: DB_TCC
            -> TABELA: tb_usuario
            -> Campos:
                - usu_cod
                - usu_nickname
                - usu_email
                - usu_celular
                - usu_senha
                - usu_money
    */

    // Utilizado para o testeDAO 
    // require_once "../app/util/ConexaoMySql.php";

    // Classes de acesso ao banco de dados \\
    require_once "../util/ConexaoMySql.php";

    class UsuarioDAO
    {

        // INSERT INTO \\
        public function create($usu_nickname, $usu_email, $usu_celular, $usu_senha, $usu_money)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "INSERT INTO tb_usuario (usu_nickname, usu_email, usu_celular, usu_senha, usu_money)
                VALUES (
                    '$usu_nickname',
                    '$usu_email',
                    '$usu_celular',
                    '$usu_senha',
                    '$usu_money'
                );"
            ) or die($query->error);
        }

        // SELECT \\
        public function list($usu_cod="", $usu_nickname="", $usu_email="", $usu_celular="", $usu_senha="", $usu_money="")
        {
            $conexao = new ConexaoMySql();
            $conexao->setCampos(
                array(
                    "usu_cod" => $usu_cod,
                    "usu_nickname" => $usu_nickname,
                    "usu_email" => $usu_email,
                    "usu_celular" => $usu_celular,
                    "usu_senha" => $usu_senha,
                    "usu_money" => $usu_money
                )
            );
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "SELECT usu_cod, usu_nickname, usu_email, 
                        usu_celular, usu_senha, usu_money
                FROM tb_usuario " . $conexao->gerarCondicoes()
            ) or die($query->error);
            // Verificando se a consulta não retornou mais de um resultado
            if(mysqli_num_rows($query) > 1){
                return ("FORAM ENCONTRADOS MAIS DE UM REGISTRO COM ESTAS INFORMAÇÕES");
            }else{
                // Verificando se foram retornados registros da consulta
                if(mysqli_num_rows($query) == 0){
                    return "CONSULTA VAZIA";
                } else{
                    // Retornando os resultados da query em array
                    $res = mysqli_fetch_assoc($query);
                    return array(
                        "usu_cod" => $res["usu_cod"],
                        "usu_nickname" => $res["usu_nickname"],
                        "usu_email" => $res["usu_email"],
                        "usu_celular" => $res["usu_celular"],
                        "usu_senha" => $res["usu_senha"],
                        "usu_money" => $res["usu_money"]
                    );
                }
            }
        }

        // UPDATE \\
        public function update($usu_cod, $usu_nickname, $usu_email, $usu_celular, $usu_senha, $usu_money)
        {
            $conexao = new ConexaoMySql();
            // Alteração só é realizada perante a PK
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "UPDATE tb_usuario SET
                    usu_nickname = '$usu_nickname',
                    usu_email = '$usu_email',
                    usu_celular = '$usu_celular',
                    usu_senha = '$usu_senha',
                    usu_money = '$usu_money'
                WHERE usu_cod = '$usu_cod';"
            ) or die($query->error);
        }

        // DELETE \\
        public function delete($usu_cod)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "DELETE FROM tb_usuario WHERE usu_cod = '$usu_cod'"
            ) or die($query->error);

        }

    }
?>