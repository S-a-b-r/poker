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
            return ['error', '5']; // Не введен логин или пароль
        }

        public function logout($params){
            if($params['token']){
                return $this->user->logout($params['token']);
            }
            return ['error', '6']; // Не произведен вход в аккаунт
        }

        //
        public function registration($params){
            $login =  $params['login'];
            $password = $params['password'];
            $nickname = $params['nickname'];

            if(strlen($login) < 3 || strlen($login) > 30 ){
                return ['error', '2']; // Логин неверной длины
            }
            elseif(strlen($password) < 5) {
                return ['error', '3']; // Пароль слишком короткий
            }
            elseif(strlen($nickname) < 3){
                return ['error', '4']; // Никнейм слишком короткий
            }
            
            return $this->user->registration($login,$password,$nickname);
        }

        public function transferToMoney($params){
            if($params['money'] && $params['token']){
                return $this->user->transferToMoney($params['token'], $params['money']);
            }
            return ['error', '7']; // Недостаточно средств на счету
        }

        public function transferToBank($params){
            if($params['money'] && $params['token']){
                return $this->user->transferToBank($params['token'], $params['money']);
            }
            return ['error', '7']; // Недостаточно средств на счету
        }

        //GET


        public function getUserByToken($params){
            return $this->user->getUserByToken($params['token']);
        }

        public function getUserById($params){
            if($params['id']){
                return $this->user->getUserById($params['id']);
            }
            return ['error', '8']; // Не введен id
        }

        public function getStatsById($params){
            if($params['id']){
                return $this->user->getStatsById($params['id']);
            }
            return ['error', '8']; // Не введен id
        }



        ////////////////////////////////////////////////
        ///////////////////TABLE////////////////////////
        ////////////////////////////////////////////////
        

        //POST

        public function deleteTableById($params){
            if($params['id']){
                return $this->table->deleteTableById($params['id']);
            }
            return ['error', '8']; // Не введен id
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
            return ['error', '9']; //Нет имени стола
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
                    return ['error', '12']; //Кол-во игроков за столом максимально
                }
                return ['error', '11']; //Такой стол не существует
            }
            return ['error', '6']; //Не произведен вход в аккаунт || пользователь с таким токеном не найден
        }

        public function disconnectFromTable($params){
            $user = $this->user->getUserByToken($params['token']);
            if($user && $params['id']){
                return $this->table->disconnectFromTable($user['id'], $params['id']);
            }
            return ['error', '8']; //Не введен id 
        }




        //GET

        public function getQuantPlayersOnTable($params){
            if($params['id']){
                return $this->table->getQuantPlayersOnTable($params['id']);
            }
            return ['error', '8']; //Не введен id 
        }

        public function getAllTables(){
            return $this->table->getAllTables();
        }

        public function getTableById($params){
            if($params['id']){
                return $this->table->getTableById($params['id']);
            }
            return ['error', '8']; //Не введен id 
        }






        //////////////////////////////////////////////////////
        ///////////////////GAME///////////////////////////////
        //////////////////////////////////////////////////////

        //public function checkCombination($params){
        //    if($params['cards']){
        //        return $this->game->checkCombination($params['cards']);
        //    }
        //    return false;
        //}

        public function getRandomCard($params){
            if($params['n']){
                return $this->game->getRandomCard($params['n']);
            }
            return $this->game->getRandomCard(5);
        }
    }
?>