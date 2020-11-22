<?php
    require_once('DB.php');
    require_once('User.php');
    class Application{
        function __construct(){
            $this->user = new User();
            $this->db = new DB();
        }
        
        public function login($params){
            if($params['login'] && $params['password']){
                return $this->user->login($params['login'],$params['password']);
            }
            return false;
        }

        public function registration($params){
            $login =  $params['login'];
            $password = $params['password'];
            $nickname = $params['nickname'];

            if(strlen($login) < 3 || strlen($login) > 30 ){
                return false;
            }
            elseif(strlen($password) < 5) {
                return false;
            }
            elseif(strlen($nickname) < 3){
                return false;
            }
            
            return $this->user->registration($login,$password,$nickname);
        }

        public function getAllTables(){
            return $this->db->getAllTables();
        }
    }
?>