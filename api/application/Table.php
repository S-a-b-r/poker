<?php
    class Table{
        function __construct(){
            $this->db = new DB();
        }

        public function getAllTables(){
            return $this->db->getAllTables();
        }

        public function createTable($token,$name, $quant, $rates, $password){
            $userId = $this->db->getUserByToken($token)['id'];
            return $this->db->createTable($name, $quant, $rates, $password, $userId);
            
        }
    }
?>