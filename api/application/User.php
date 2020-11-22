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
                    $token = md5($hash);
                    return $token;
                }
            } 
            return false;
        }

        public function registration($login,$password,$nickname){
            if($this->db->getUserByLogin($login)){
                return false;
            }
            $password = md5($login.$password."qpalzm10");
            return $this->db->registrationUser($login,$password,$nickname);
        }
    }
?>