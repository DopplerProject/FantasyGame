<?php

    /* 
        INFORMAÇÕES DO DATA ACESS OBJECT (DAO):
            -> DATABASE: DB_TCC
            -> TABELA: rl_player_organizacao
            -> Campos:
                - pro_cod
                - pro_seq
                - pro_time
                - pro_valor
    */

    // Utilizado para o testeDAO require_once 
    // "../app/util/ConexaoMySql.php";

    // Classes de acesso ao banco de dados \\
    require_once "../util/ConexaoMySql.php";

    class PlayerOrganizacaoDAO
    {

        // INSERT INTO \\
        public function create($pro_cod, $pro_seq, $pro_time, $pro_valor)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "INSERT INTO rl_player_organizacao (pro_cod, pro_seq, pro_time, pro_valor)
                VALUES (
                    '$pro_cod',
                    '$pro_seq',
                    '$pro_time',
                    '$pro_valor'
                );"
            ) or die($query->error);
        }

        // SELECT \\
        public function list($pro_cod = "", $pro_seq = "", $pro_time = "", $pro_valor = "")
        {
            $conexao = new ConexaoMySql();
            $conexao->setCampos(
                array(
                    "pro_cod" => $pro_cod,
                    "pro_seq" => $pro_seq,
                    "pro_time" => $pro_time,
                    "pro_valor" => $pro_valor
                )
            );
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "SELECT pro_cod, pro_seq, pro_time, pro_valor
                FROM rl_player_organizacao" . $conexao->gerarCondicoes()
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
                        "pro_seq" => $res["pro_seq"],
                        "pro_time" => $res["pro_time"],
                        "pro_valor" => $res["pro_valor"]
                    );
                }
            }
        }

        // UPDATE \\
        public function update($pro_cod, $pro_seq, $pro_time, $pro_valor)
        {
            $conexao = new ConexaoMySql();
            // Alteração só é realizada perante a PK
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "UPDATE rl_player_organizacao SET
                    pro_time = '$pro_time',
                    pro_valor = '$pro_valor'
                WHERE pro_cod = '$pro_cod'
                    AND pro_seq = '$pro_seq';"
            ) or die($query->error);
        }

        // DELETE \\
        public function delete($pro_cod, $pro_seq)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "DELETE
                 FROM rl_player_organizacao
                 WHERE pro_cod = '$pro_cod'
                    AND pro_seq = '$pro_seq';"
            ) or die($query->error);

        }

    }
?>