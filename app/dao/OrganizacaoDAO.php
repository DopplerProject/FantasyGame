<?php

    /* 
        INFORMAÇÕES DO DATA ACESS OBJECT (DAO):
            -> DATABASE: DB_TCC
            -> TABELA: tb_organizacao
            -> Campos:
                - org_cod
                - org_desc
                - org_pais
    */

    // Utilizado para o testeDAO require_once 
    // "../app/util/ConexaoMySql.php";

    // Classes de acesso ao banco de dados \\
    require_once "../util/ConexaoMySql.php";

    class OrganizacaoDAO
    {

        // INSERT INTO \\
        public function create($org_desc, $org_pais)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "INSERT INTO tb_organizacao (org_desc, org_pais)
                VALUES (
                    '$org_desc',
                    '$org_pais'
                );"
            ) or die($query->error);
        }

        // SELECT \\
        public function list($org_cod = "", $org_desc = "", $org_pais = "")
        {
            $conexao = new ConexaoMySql();
            $conexao->setCampos(
                array(
                    "org_cod" => $org_cod,
                    "org_desc" => $org_desc,
                    "org_pais" => $org_pais
                )
            );
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "SELECT org_cod, org_desc, org_pais
                FROM tb_organizacao" . $conexao->gerarCondicoes()
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
                        "org_cod" => $res["org_cod"],
                        "org_desc" => $res["org_desc"],
                        "org_pais" => $res["org_pais"],
                        "pro_nome" => $res["pro_nome"]
                    );
                }
            }
        }

        // UPDATE \\
        public function update($org_cod, $org_desc, $org_pais)
        {
            $conexao = new ConexaoMySql();
            // Alteração só é realizada perante a PK
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "UPDATE tb_organizacao SET
                    org_desc = '$org_desc',
                    org_pais = '$org_pais',
                WHERE org_cod = '$org_cod';"
            ) or die($query->error);
        }

        // DELETE \\
        public function delete($org_cod)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "DELETE FROM tb_organizacao WHERE org_cod = '$org_cod'"
            ) or die($query->error);

        }
    }
?>