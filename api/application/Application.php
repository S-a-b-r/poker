<?php
    require_once('DB.php');
    require_once('User.php');
    class Application{
        function __construct(){
            $this->db = new DB();
            $this->user = new User($this->db);
        }
        
        public function login($params){
            if($params['login'] && $params['password']){
                return $this->user->login($params['login'],$params['password']);
            }
            return false;
        }

        public function getName(){
            return $this->db->getName();
        }
    }
?>