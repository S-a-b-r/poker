<?php
    class Table{
        function __construct(){
            $this->db = new DB();
        }

        
        //POST

        public function deleteTableById($id){
            return $this->db->deleteTableById($id);
        }

        public function createTable($token,$name, $quant, $rates, $password){
            $userId = $this->db->getUserByToken($token)['id'];
            return $this->db->createTable($name, $quant, $rates, $password, $userId);
        }

        public function connectToTable($userId, $tableId){
            return $this->db->connectToTable($userId, $tableId);
        }

        public function disconnectFromTable($userId, $tableId){
            $quant = $this->getQuantPlayersOnTable($tableId);
            if($quant == 1){
                return $this->db->deleteTableById($tableId);
            }
            return $this->db->disconnectFromTable($userId,$tableId);
        }



        //GET

        public function getQuantPlayersOnTable($id){
            $players = $this->db->getTableById($id)['active_players_id'];
            $players = explode(" ", $players);
            return count($players);
        }

        public function getAllTables(){
            return $this->db->getAllTables();
        }

        public function getTableById($id){
            return $this->db->getTableById($id);
        }
    }
?>