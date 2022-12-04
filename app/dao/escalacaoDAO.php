<?php

    /* 
        INFORMAÇÕES DO DATA ACESS OBJECT (DAO):
            -> DATABASE: '$esc_codigo',
'$esc_sequencia',
'$esc_usuario',
'$esc_playerEscalado',
'$esc_multiplicador',
'$esc_periodo'DB_TCC
            -> TABELA: tb_escalacao
            -> Campos:
                - esc_codigo 
                - esc_sequencia 
                - esc_usuario 
                - esc_playerEscalado
                - esc_multiplicador 
                - esc_periodo
    */

    // Utilizado para o testeDAO require_once 
    // "../app/util/ConexaoMySql.php";

    // Classes de acesso ao banco de dados \\
    require_once "../util/ConexaoMySql.php";

    class EscalacaoDAO
    {

        // INSERT INTO \\
        public function create($esc_sequencia = "", $esc_usuario = "", $esc_playerEscalado = "", $esc_multiplicador = "", $esc_periodo = "")
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "INSERT INTO tb_escalacao (esc_codigo, esc_sequencia, esc_usuario, esc_playerEscalado, esc_multiplicador, esc_periodo)
                VALUES (
                    '$esc_sequencia',
                    '$esc_usuario',
                    '$esc_playerEscalado',
                    '$esc_multiplicador',
                    '$esc_periodo'
                );"
            ) or die($query->error);
        }

        // SELECT \\
        public function list($esc_codigo = "", $esc_sequencia = "", $esc_usuario = "", $esc_playerEscalado = "", $esc_multiplicador = "", $esc_periodo = "")
        {
            $conexao = new ConexaoMySql();
            $conexao->setCampos(
                array(
                    "esc_codigo" => $esc_codigo,
                    "esc_sequencia" => $esc_sequencia,
                    "esc_usuario" => $esc_usuario,
                    "esc_playerEscalado" => $esc_playerEscalado,
                    "esc_multiplicador" => $esc_multiplicador,
                    "esc_periodo" => $esc_periodo
                )
            );
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "SELECT esc_codigo, esc_sequencia, esc_usuario,
                        esc_playerEscalado, esc_multiplicador, esc_periodo
                FROM tb_escalacao" . $conexao->gerarCondicoes()
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
                        "esc_codigo" => $res["esc_codigo"],
                        "esc_sequencia" => $res["esc_sequencia"],
                        "esc_usuario" => $res["esc_usuario"],
                        "esc_playerEscalado" => $res["esc_playerEscalado"],
                        "esc_multiplicador" => $res["esc_multiplicador"],
                        "esc_periodo" => $res["esc_periodo"]
                    );
                }
            }
        }

        // UPDATE \\
        public function update($esc_codigo, $esc_sequencia, $esc_usuario, $esc_playerEscalado, $esc_multiplicador, $esc_periodo)
        {
            $conexao = new ConexaoMySql();
            // Alteração só é realizada perante a PK
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "UPDATE tb_escalacao SET
                    esc_usuario = '$esc_usuario',
                    esc_playerEscalado = '$esc_playerEscalado',
                    esc_multiplicador = '$esc_multiplicador',
                    esc_periodo = '$esc_periodo'
                WHERE esc_codigo = '$esc_codigo'
                    AND esc_sequencia = '$esc_sequencia',;"
            ) or die($query->error);
        }

        // DELETE \\
        public function delete($esc_codigo, $esc_sequencia)
        {
            $conexao = new ConexaoMySql();
            $query = mysqli_query(
                $conexao->estabelecerConexao(),
                "DELETE
                 FROM tb_escalacao 
                 WHERE esc_codigo = '$esc_codigo'
                    AND esc_sequencia = '$esc_sequencia'"
            ) or die($query->error);

        }

    }
?>