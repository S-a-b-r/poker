<?php
    class User{
        function __construct(){
            $this->db = new DB();
            $this->secret = "qpalzm10";
        }

        public function login($login, $password){
            $user = $this->db->getUserByLogin($login);
            if($user){
                $hash = md5($login.$password.$this->secret);
                $hashU = $user['password'];
                if($hashU == $hash){
                    return $user['token'];
                }
            }
            return false;
        }

        public function logout($token){
            $token = null;
            return true;
        }

        public function getUserByToken($token){
            return $this->db->getUserByToken($token);
        }

        public function registration($login,$password,$nickname){
            if($this->db->getUserByLogin($login)){
                return false;
            }
            $password = md5($login.$password.$this->secret);
            $token = md5($password);
            return $this->db->registrationUser($login, $password, $token, $nickname);
        }
    }
?>