<?php
    require_once('DB.php');
    require_once('User.php');
    require_once('Table.php');
    require_once('Game.php');
    require_once('Cookie.php');

    class Application{
        function __construct(){
            $this->user = new User();
            $this->table = new Table();
            $this->game = new Game();
        }



        //////////////////////////////////////
        ///////////////USER///////////////////
        //////////////////////////////////////


        //POST

        public function login($params){
            if($params['login'] && $params['password']){
                return $this->user->login($params['login'],$params['password']);
            }
            return false;
        }

        public function logout($params){
            if($params['token']){
                return $this->user->logout($params['token']);
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

        public function transferToMoney($params){
            if($params['money'] && $params['token']){
                return $this->user->transferToMoney($params['token'], $params['money']);
            }
            return false;
        }

        public function transferToBank($params){
            if($params['money'] && $params['token']){
                return $this->user->transferToBank($params['token'], $params['money']);
            }
            return false;
        }

        //GET


        public function getUserByToken($params){
            return $this->user->getUserByToken($params['token']);
        }

        public function getUserById($params){
            if($params['id']){
                return $this->user->getUserById($params['id']);
            }
            return false;
        }

        public function getStatsById($params){
            if($params['id']){
                return $this->user->getStatsById($params['id']);
            }
            return false;
        }



        ////////////////////////////////////////////////
        ///////////////////TABLE////////////////////////
        ////////////////////////////////////////////////
        

        //POST

        public function deleteTableById($params){
            if($params['id']){
                return $this->table->deleteTableById($params['id']);
            }
            return false;
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

            if($name && $token){
                return $this->table->createTable($token, $name, $quant, $rates, $password);
            }
            return false;
        }

        public function connectToTable($params){
            $token = $params['token'];
            $tableId = $params['id'];
            $user = $this->user->getUserByToken($token);
            if($user){
                $tables = $this->table->getTableById($tableId);
                if($tables){
                    $quant = $this->table->getQuantPlayersOnTable($tableId);
                    if($quant < $tables['quantity_players']){
                        return $this->table->connectToTable($user['id'], $tableId);//прописать
                    }
                    return false;
                }
                return false;
            }
            return false;
        }

        public function disconnectFromTable($params){
            $user = $this->user->getUserByToken($params['token']);
            if($user && $params['id']){
                return $this->table->disconnectFromTable($user['id'], $params['id']);
            }
            return false;
        }




        //GET

        public function getQuantPlayersOnTable($params){
            if($params['id']){
                return $this->table->getQuantPlayersOnTable($params['id']);
            }
            return false;
        }

        public function getAllTables(){
            return $this->table->getAllTables();
        }

        public function getTableById($params){
            if($params['id']){
                return $this->table->getTableById($params['id']);
            }
            return false;
        }






        //////////////////////////////////////////////////////
        ///////////////////GAME///////////////////////////////
        //////////////////////////////////////////////////////


        public function getRandomCard(){
            return $this->game->getRandomCard();
        }
    }
?>