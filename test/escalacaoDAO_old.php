<?php

    /* INFORMAÇÕES
        -> DATABASE: DB_TCC
        -> TABELA: tb_escalacao
    */

    // Inclusão do arquivo de conexão e das condições SQL \\
    require_once "../../app/util/MySqlConnection.php";
    require_once "../../app/util/SqlConditions.php";

    class EscalacaoDAO
    {
        // Atributos da classe
        private $esc_codigo;
        private $esc_sequencia;
        private $esc_usuario;
        private $esc_playerEscalado;
        private $esc_multiplicador;

        // Insert into
        public function create(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "INSERT INTO tb_escalacao (esc_sequencia, esc_usuario, esc_playerEscalado, esc_multiplicador)
                VALUES (
                    '$this->esc_sequencia',
                    '$this->esc_usuario',
                    '$this->esc_playerEscalado',
                    '$this->esc_multiplicador'
                );"
            );
        }

        // Listar os valores nas variáveis da classe
        public function list($esc_codigo="", $esc_sequencia="", $esc_usuario="", $esc_playerEscalado="", $esc_multiplicador=""){
            $conection = new ConectionDatabase();
            $condition = new SqlConditions();
            $condition->setFields(array(
                "esc_codigo" => $esc_codigo,
                "esc_sequencia" => $esc_sequencia,
                "esc_usuario" => $esc_usuario,
                "esc_playerEscalado" => $esc_playerEscalado,
                "esc_multiplicador" => $esc_multiplicador
            ));
            $select = "SELECT * FROM tb_escalacao " . $condition->generateSqlConditions();
            $query = mysqli_query(
                $conection->conectDatabase(),
                $select
            );
            if(mysqli_num_rows($query) > 1){
                echo("OPS! ALGO DEU ERRADO!\nCOD ERRO: 808");  // Select retornou duplicado
            } else{
                if(mysqli_num_rows($query) == 0){
                    return "NENHUMA INFORMAÇÕES FOI ENCONTRADA COM ESTES FILTROS!";
                } else{
                    // Salvando os resultados nas variáveis da classe \\
                    $res = mysqli_fetch_assoc($query);
                    $this->esc_codigo = $res["esc_codigo"];
                    $this->esc_sequencia = $res["esc_sequencia"];
                    $this->esc_usuario = $res["esc_usuario"];
                    $this->esc_playerEscalado = $res["esc_playerEscalado"];
                    $this->esc_multiplicador = $res["esc_multiplicador"];
                }
            }
        }
        // Pegar os valores das variáveis e subir para o banco
        public function update(){
            $conection = new ConectionDatabase();
            mysqli_query(
                $conection->conectDatabase(),
                "UPDATE tb_escalacao SET
                    esc_sequencia = '$this->esc_sequencia',
                    esc_usuario = '$this->esc_usuario',
                    esc_playerEscalado = '$this->esc_playerEscalado',
                    esc_multiplicador = '$this->esc_multiplicador'
                WHERE esc_codigo = '$this->esc_codigo';"
            );
        }
        // Delete de registros com base no código
        public function delete(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "DELETE FROM tb_escalacao WHERE esc_codigo = '$this->esc_cogido';"
            );
        }

        // --- Getters e Setters --- \\
        public function getEsc_codigo(){
            return $this->esc_codigo;
        }
        public function setEsc_codigo($e){
            $this->esc_codigo = $e;
        }
        public function getEsc_sequencia(){
            return $this->esc_sequencia;
        }
        public function setEsc_sequencia($e){
            $this->esc_sequencia = $e;
        }
        public function getEsc_usuario(){
            return $this->esc_usuario;
        }
        public function setEsc_usuario($e){
            $this->esc_usuario = $e;
        }
        public function getEsc_playerEscalado(){
            return $this->esc_playerEscalado;
        }
        public function setEsc_playerEscalado($e){
            $this->esc_playerEscalado = $e;
        }
        public function getEsc_multiplicador(){
            return $this->esc_multiplicador;
        }
        public function setEsc_multiplicador($e){
            $this->esc_multiplicador = $e;
        }
    }
?>