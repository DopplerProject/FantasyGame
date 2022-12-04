<?php

    /* 
        INFORMAÇÕES DO DATA ACESS OBJECT (DAO):
            -> DATABASE: DB_TCC
            -> TABELA: tb_player
            -> Campos:
                - pro_cod
                - pro_nickname
                - pro_dtNasc
                - pro_nome
    */

    // Utilizado para o testeDAO require_once 
    // "../app/util/ConexaoMySql.php";

    // Classes de acesso ao banco de dados \\
    require_once "../util/ConexaoMySql.php";

    class PlayerDAO
    {

        // INSERT INTO \\
        public function create($pro_nickname, $pro_dtNasc, $pro_nome)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "INSERT INTO tb_player (pro_nickname, pro_dtNasc, pro_nome)
                VALUES (
                    '$pro_nickname',
                    '$pro_dtNasc',
                    '$pro_nome'
                );"
            ) or die($query->error);
        }

        // SELECT \\
        public function list($pro_cod = "", $pro_nickname = "", $pro_dtNasc = "", $pro_nome = "")
        {
            $conexao = new ConexaoMySql();
            $conexao->setCampos(
                array(
                    "pro_cod" => $pro_cod,
                    "pro_nickname" => $pro_nickname,
                    "pro_dtNasc" => $pro_dtNasc,
                    "pro_nome" => $pro_nome
                )
            );
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "SELECT pro_cod, pro_nickname, pro_dtNasc, pro_nome
                FROM tb_player" . $conexao->gerarCondicoes()
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
                        "pro_cod" => $res["pro_cod"],
                        "pro_nickname" => $res["pro_nickname"],
                        "pro_dtNasc" => $res["pro_dtNasc"],
                        "pro_nome" => $res["pro_nome"]
                    );
                }
            }
        }

        // UPDATE \\
        public function update($pro_cod, $pro_nickname, $pro_dtNasc, $pro_nome)
        {
            $conexao = new ConexaoMySql();
            // Alteração só é realizada perante a PK
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "UPDATE tb_player SET
                    pro_nickname = '$pro_nickname',
                    pro_dtNasc = '$pro_dtNasc',
                    pro_nome = '$pro_nome'
                WHERE pro_cod = '$pro_cod';"
            ) or die($query->error);
        }

        // DELETE \\
        public function delete($pro_cod)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "DELETE FROM tb_player WHERE pro_cod = '$pro_cod'"
            ) or die($query->error);

        }

    }
?>