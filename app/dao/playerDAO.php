<?php
    /* INFORMAÇÕES
            -> DATABASE: DB_TCC
            -> TABELAS: tb_player, rl_player_organizacao;
    */

    // Inclusão do arquivo de conexão e das condições SQL \\
    require_once "../../app/util/MySqlConnection.php";
    require_once "../../app/util/SqlConditions.php";

    // Classe DAO \\
    class UsuarioDAO
    {
        // Atributos da classe
        private $pro_cod;
        private $pro_nickname;
        private $pro_dtNasc;
        private $pro_nome;
        private $pro_seq;
        private $pro_time;
        private $pro_valor;

        // Insert Into
        public function create($flag){
            $conection = new ConectionDatabase();
            if($flag == 1){
                mysqli_query
                (
                    $conection->conectDatabase(),
                    "INSERT INTO tb_player(pro_nickname, pro_dtNasc, pro_nome)
                     VALUES (
                        '$this->pro_nickname',
                        '$this->pro_dtNasc',
                        '$this->pro_nome'
                    );"
                );
            }
            mysqli_query
            (
                $conection->conectDatabase(),
                "IINSERT INTO rl_player_organizacao(pro_seq, pro_time, pro_valor)
                 VALUES (
                    '$this->pro_seq',
                    '$this->pro_time',
                    '$this->pro_valor'
                );"
            );
        }
        // Listar os valores nas variáveis da classe
        public function list($pro_cod="", $pro_nickname="", $pro_dtNasc="", $pro_nome="", $pro_seq="", $pro_time="", $pro_valor=""){
            $conection = new ConectionDatabase();
            $condition = new SqlConditions();
            $condition->setFields(array(
                "pro_cod" => $pro_cod,
                "pro_nickname" => $pro_nickname,
                "pro_dtNasc" => $pro_dtNasc,
                "pro_nome" => $pro_nome,
                "pro_seq" => $pro_seq,
                "pro_time" => $pro_time,
                "pro_valor" => $pro_valor
            ));
            $select = "SELECT * FROM tb_player INNER JOIN rl_player_organizacao USING(pro_cod);" . $condition->generateSqlConditions();
            $query = mysqli_query
            (
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
                    $this->pro_cod = $res["pro_cod"];
                    $this->pro_nickname = $res["pro_nickname"];
                    $this->pro_dtNasc = $res["pro_dtNasc"];
                    $this->pro_nome = $res["pro_nome"];
                    $this->pro_seq = $res["pro_seq"];
                    $this->pro_time = $res["pro_time"];
                    $this->pro_valor = $res["pro_valor"];
                }
            }
        }
        // Pegar os valores das variáveis e subir para o banco
        public function update(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "UPDATE tb_usuario SET
                    pro_nickname = '$this->pro_nickname',
                    pro_dtNasc = '$this->pro_dtNasc',
                    pro_nome = '$this->pro_nome',
                    usu_money = '$this->usu_money'
                WHERE pro_cod = '$this->pro_cod';"
            );
        }
        // Delete de registros com base no cod
        public function delete(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "DELETE FROM tb_usuario WHERE pro_cod = '$this->pro_cod';"
            );
        }

        // --- Getters e Setters --- \\
        public function getpro_cod(){
            return $this->pro_cod;
        }
        public function setpro_cod($e){
            $this->pro_cod = trim($e);
        }
        public function getpro_nickname(){
            return $this->pro_nickname;
        }
        public function setpro_nickname($e){
            $this->pro_nickname = strtoupper(trim($e));
        }
        public function getpro_dtNasc(){
            return $this->pro_dtNasc;
        }
        public function setpro_dtNasc($e){
            $this->pro_dtNasc = strtolower(trim($e));
        }
        public function getpro_nome(){
            return $this->pro_nome;
        }
        public function setpro_nome($e){
            $this->pro_nome = trim($e);
        }
        public function getUsu_senha(){
            return $this->usu_senha;
        }
        public function setUsu_senha($e){
            $this->usu_senha = trim($e);
        }
        public function getUsu_money(){
            return $this->usu_money;
        }
        public function setUsu_money($e){
            $this->usu_money = $e;
        }
    }
?>