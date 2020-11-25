<?php
    class Table{
        function __construct(){
            $this->db = new DB();
        }

        public function getAllTables(){
            return $this->db->getAllTables();
        }

        public function createTable($name, $quant, $rates, $password){
            this->db->getUserByToken();
            
        }
    }
?>