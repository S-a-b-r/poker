<?php
    class Table{
        function __construct(){
            $this->db = new DB();
        }

        public function getAllTables(){
            return $this->db->getAllTables();
        }

        public function getTableById($id){
            return $this->db->getTableById($id);
        }

        public function deleteTableById($id){
            return $this->db->deleteTableById($id);
        }

        public function createTable($token,$name, $quant, $rates, $password){
            $userId = $this->db->getUserByToken($token)['id'];
            return $this->db->createTable($name, $quant, $rates, $password, $userId);
        }
    }
?>