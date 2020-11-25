<?php
    require_once('DB.php');
    require_once('User.php');
    require_once('Table.php');

    class Application{
        function __construct(){
            $this->user = new User();
            $this->table = new Table();
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
            return $this->table->getAllTables();
        }

        public function createTable($params){
            $name = $params['name'];
            $quant = (int)$params['quantplayers'];
            if($quant >= 7){
                $quant = 7;
            }
            elseif($quant <= 4){
                $quant = 4;
            }
            $rates = $params['rates'];
            $password = $params['password'];

            if($name){
                return $this->table->createTable($name, ($quant) || (6), ($rates) || (20), ($password) || null);
            }
            return false;
        }
    }
?>