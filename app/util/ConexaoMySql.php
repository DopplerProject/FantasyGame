<?php
    //--- Classe de conexão com o banco de dados ---//
    class ConexaoMySql
    {
        // Atributos das informações de conexão com o banco de dados \\
        private $mysqlIp = "127.0.0.1";
        private $mysqlUser = "root";
        private $mysqlPassword = "";
        private $mysqlDatabase = "DB_TCC";
        // private $mysqlDatabase = "DB_WEB";

        // Atributos da classe \\
        private $campos;
        
        // Função que retorna objeto de conexão com a base de dados MySql \\
        public function estabelecerConexao()
        {
            $conexao = mysqli_connect($this->mysqlIp, $this->mysqlUser, $this->mysqlPassword, $this->mysqlDatabase);
            // Checando o estabelecimento da conexão
            if (mysqli_connect_errno()){
                echo "PROBLEMAS AO ESTABELECER CONEXÃO COM O BANCO DE DADOS!";
            } else{
                return $conexao;
            }
        }

        // Função que gera as condições SQL \\
        public function gerarCondicoes()
        {
            $cont = 0;
            $condicao = "";
            foreach ($this->campos as $chave => $valor) {
                if($valor <> ''){
                    if($cont == 0){
                        $condicao .= " WHERE $chave = '$valor' ";
                    } else if($valor <> ''){
                        $condicao .= " AND $chave = '$valor' ";
                    }
                    $cont += 1;
                }
            }
            return $condicao;
        }

        // Getters e Setters \\
        public function getCampos(){
            return $this->campos;
        }
        public function setCampos($e){
            $this->campos = $e;
        }
        public function getMysqlIp(){
            return $this->mysqlIp;
        }
        public function setMysqlIp($e){
            $this->mysqlIp = trim($e);
        }
        public function getMysqlUser(){
            return $this->mysqlUser;
        }
        public function setMysqlUser($e){
            $this->mysqlUser = trim($e);
        }
        public function getMysqlPassword(){
            return $this->mysqlIp;
        }
        public function setMysqlPassword($e){
            $this->mysqlPassword = trim($e);
        }
        public function getMysqlDatabase(){
            return $this->mysqlDatabase;
        }
        public function setMysqlDatabase($e){
            $this->mysqlDatabase = trim($e);
        }
    }
?>