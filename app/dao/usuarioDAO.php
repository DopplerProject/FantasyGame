<?php
    /* INFORMAÇÕES
            -> DATABASE: DB_TCC
            -> TABELA: tb_usuario;
    */

    // Inclusão do arquivo de conexão e das condições SQL \\
    require_once "../../app/util/MySqlConnection.php";
    require_once "../../app/util/SqlConditions.php";

    // Classe DAO \\
    class UsuarioDAO
    {
        // Atributos da classe
        private $usu_cod;
        private $usu_nickname;
        private $usu_email;
        private $usu_celular;
        private $usu_senha;
        private $usu_money;

        // Insert Into
        public function create(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "INSERT INTO tb_usuario (usu_nickname, usu_email, usu_celular, usu_senha, usu_money)
                VALUES (
                    '$this->usu_nickname',
                    '$this->usu_email',
                    '$this->usu_celular',
                    '$this->usu_senha',
                    '$this->usu_money'
                );"
            );
        }
        // Listar os valores nas variáveis da classe
        public function list($usu_cod="", $usu_nickname="", $usu_email="", $usu_celular=""){
            $conection = new ConectionDatabase();
            $condition = new SqlConditions();
            $condition->setFields(array(
                "usu_cod" => $usu_cod,
                "usu_nickname" => $usu_nickname,
                "usu_email" => $usu_email,
                "usu_celular" => $usu_celular
            ));
            $select = "SELECT * FROM tb_usuario " . $condition->generateSqlConditions();
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
                    $this->usu_cod = $res["usu_cod"];
                    $this->usu_nickname = $res["usu_nickname"];
                    $this->usu_email = $res["usu_email"];
                    $this->usu_celular = $res["usu_celular"];
                    $this->usu_senha = $res["usu_senha"];
                    $this->usu_money = $res["usu_money"];
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
                    usu_nickname = '$this->usu_nickname',
                    usu_email = '$this->usu_email',
                    usu_celular = '$this->usu_celular',
                    usu_money = '$this->usu_money'
                WHERE usu_cod = '$this->usu_cod';"
            );
        }
        // Delete de registros com base no cod
        public function delete(){
            $conection = new ConectionDatabase();
            mysqli_query
            (
                $conection->conectDatabase(),
                "DELETE FROM tb_usuario WHERE usu_cod = '$this->usu_cod';"
            );
        }

        // --- Getters e Setters --- \\
        public function getUsu_cod(){
            return $this->usu_cod;
        }
        public function setUsu_cod($e){
            $this->usu_cod = trim($e);
        }
        public function getUsu_nickname(){
            return $this->usu_nickname;
        }
        public function setUsu_nickname($e){
            $this->usu_nickname = strtoupper(trim($e));
        }
        public function getUsu_email(){
            return $this->usu_email;
        }
        public function setUsu_email($e){
            $this->usu_email = strtolower(trim($e));
        }
        public function getUsu_celular(){
            return $this->usu_celular;
        }
        public function setUsu_celular($e){
            $this->usu_celular = trim($e);
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