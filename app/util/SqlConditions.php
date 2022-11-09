<?php
    class SqlConditions
    {
        private $fields = array();  

        public function generateSqlConditions(){
            $cont = 0;
            $sqlCondition = "";
            foreach ($this->fields as $key => $value) {
                if($value <> ''){
                    if($cont == 0){
                        $sqlCondition .= "WHERE $key = '$value' ";
                    } else if($value <> ''){
                        $sqlCondition .= " AND $key = '$value' ";
                    }
                    $cont += 1;
                }
            }
            return $sqlCondition;
        }

        public function setFields($e){
            $this->fields = $e;
        }
        public function setModoDebug($e){
            $this->modoDebug = $e;
        }
    }
?>