<?php
    class User{
        function __construct(){
            $this->db = new DB();
            $this->cookie = new Cookie();
            $this->secret = "qpalzm10";
        }


        //POST

        public function login($login, $password){
            $user = $this->db->getUserByLogin($login);
            if($user){
                if(md5($login.$password.$this->secret) == $user['password']){
                    $rand = rand (0,100000);
                    $token = md5($user['password'].$rand);
                    $this->db->updateToken($user['id'], $token);
                    $this->cookie->updateTokenInCookie($token);
                    return ['true', $token];
                }
                return ['error', '13']; //Введен неверный пароль
            }
            return ['error', '10']; // введен не верный логин(игрока с таким логином не существует)
        }

        public function logout($token){
            $user = $this->db->getUserByToken($token);
            if($user){
                $this->db->updateToken($user['id'], null);
                $this->cookie->deleteTokenInCookie();
                return true;
            }
            return ['error','6']; //Не произведен вход в аккаунт
        }
//
        public function registration($login,$password,$nickname){
            if($this->db->getUserByLogin($login)){
                return ['error','1'];//Пользователь с таким логином существует
            }
            $password = md5($login.$password.$this->secret);
            return $this->db->registrationUser($login, $password, null, $nickname);
        }

        public function transferToMoney($token, $money){
            $user = $this->db->getUserByToken($token);
            if($user){
                if((int)$user['bank'] >= $money){
                    $activeMoney = $user['money'] + $money;
                    $bank = (int)$user['bank'] - $money;
                    return $this->db->transferMoney($user['id'], $activeMoney, $bank);
                }
                return ['error', '7']; //  Недостаточно средств на счету
            }
            return ['error','6']; //Не произведен вход в аккаунт
        }

        public function transferToBank($token, $money){
            $user = $this->db->getUserByToken($token);
            if($user){
                if((int)$user['money'] >= $money){
                    $activeMoney = $user['money'] - $money;
                    $bank = (int)$user['bank'] + $money;
                    return $this->db->transferMoney($user['id'], $activeMoney, $bank);
                }
                return ['error', '7']; //  Недостаточно средств на счету
            }
            return ['error','6']; //Пользователь с таким токеном не найден
        }



        //GET

        public function getUserByToken($token){
            return $this->db->getUserByToken($token);
        }

        public function getUserById($id){
            return $this->db->getuserbyid($id);
        }

        public function getStatsById($id){
            $user = $this->db->getUserById($id);
            if($user){
                return $this->db->getStatsById($id);
            }
            return ['error','6']; //Не произведен вход в аккаунт
        }
    }
?>