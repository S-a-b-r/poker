<?php
    class User{
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
            $user = $this->db->registrationUser($login,$password,$nickname);
        }
    }
?>