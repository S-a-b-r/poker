<?php
    class User{
        function __construct(){
            $this->db = new DB();
        }

        public function login($login, $hash, $rnd){
            $user = $this->db->getUserByLogin($login);
            if($user){
                $hashS= md5($user->password.$rnd);
                if($hashS == $hash){
                    $token = md5($hash);
                    return $token;
                }
            } 
            else{
                return false;
            }
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