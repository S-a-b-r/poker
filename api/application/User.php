<?php
    class User{
        function __construct(){
            $this->db = new DB();
            $this->secret = "qpalzm10";
        }


        //POST

        public function login($login, $password){
            $user = $this->db->getUserByLogin($login);
            if($user){
                if(md5($login.$password.$this->secret) == $user['password']){
                    $rand = rand (0,100000);
                    $token = $user['password'].$rand;
                    $this->db->updateToken($user['id'], $token);
                    return $token;
                }
            }
            return false;
        }

        public function logout($token){
            $user = $this->db->getUserByToken($token);
            if($user){
                $this->db->updateToken($user['id'],null);
                return true;
            }
            return false;
        }

        public function registration($login,$password,$nickname){
            if($this->db->getUserByLogin($login)){
                return false;
            }
            $password = md5($login.$password.$this->secret);
            return $this->db->registrationUser($login, $password, null, $nickname);
        }

        public function transferMoney($token, $money){
            $user = $this->db->getUserByToken($token);
            if($user){
                if((int)$user['bank'] >= $money){
                    $activeMoney = $user['money'] + $money;
                    $bank = (int)$user['bank'] - $money;
                    return $this->db->transferMoney($user['id'], $activeMoney, $bank);
                }
                return false;
            }
            return false;
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
            return false;
        }
    }
?>