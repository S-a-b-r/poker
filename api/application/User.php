<?php
    class User{
        function __construct(){
            $this->db = new DB();
        }

        public function login($login, $password){
            $user = $this->db->getUserByLogin($login);
            if($user){
                $hash = md5($login.$password."qpalzm10");
                $hashU = $user['password'];
                if($hashU == $hash){
                    return $user['token'];
                }
            }
            return false;
        }

        public function getUserByToken($token){
            return $this->db->getUserByToken($token);
        }

        public function registration($login,$password,$nickname){
            if($this->db->getUserByLogin($login)){
                return false;
            }
            $password = md5($login.$password."qpalzm10");
            $token = md5($password);
            return $this->db->registrationUser($login, $password, $token, $nickname);
        }
    }
?>