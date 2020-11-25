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

        public function getUserByToken($params){
            return $this->user->getUserByToken($params['token']);
        }

        public function createTable($params){
            $name = $params['name'];
            $token = $params['token'];
            $quant = (int)$params['quantplayers'];
            $rates = (int)$params['rates'];
            $password = $params['password'];

            //Обрабатываем исключения для кол-ва игроков
            if($quant >= 7){
                $quant = 7;
            }
            elseif($quant <= 4 || !$quant){
                $quant = 4;
            }

            //Обрабатываем исключения для ставок
            if($rates >= 10000){
                $quant = 10000;
            }
            elseif($rates <= 20 || !$rates){
                $rates = 20;
            }

            //Обрабатываем исключения для пароля
            if(!$password){
                $password = null;
            }


            if($name && $token){
                return $this->table->createTable($token, $name, $quant, $rates, $password);
            }
            return false;
        }
    }
?>