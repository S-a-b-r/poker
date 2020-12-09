<?php
    class Table{
        function __construct(){
            $this->db = new DB();
        }

        
        //POST

        public function deleteTableById($id){
            return ['ok',$this->db->deleteTableById($id)];
        }

        public function createTable($token,$name, $quant, $rates, $password){
            $userId = $this->db->getUserByToken($token)['id'];
            return ['ok',$this->db->createTable($name, $quant, $rates, $password, $userId)];
        }

        public function connectToTable($userId, $tableId){
            return ['ok',$this->db->connectToTable($userId, $tableId)];
        }

        public function disconnectFromTable($userId, $tableId){
            $quant = $this->getQuantPlayersOnTable($tableId);
            if($quant == 1){
                return ['ok', $this->db->deleteTableById($tableId)];
            }
            return ['ok', $this->db->disconnectFromTable($userId,$tableId)];
        }



        //GET

        public function getQuantPlayersOnTable($id){
            return ['ok', $this->db->getQuantPlayersOnTable($id)];
        }

        public function getAllTables(){
            return ['ok', $this->db->getAllTables()];
        }

        public function getTableById($id){
            return ['ok', $this->db->getTableById($id)];
        }
    }
?>