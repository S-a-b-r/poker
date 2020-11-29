<?php
class DB {
    function __construct() {
        $host = "poker";
        $user = "root";
        $pass = "root";
        $name = "test_1_db";
        try {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$name, $user, $pass);
        } catch (PDOException $e) {
            print "Ошибка!: " . $e->getMessage();
            die();
        }
    }

    function __destruct() {
        $this->db = null;
    }


    //////////////////////////////////////
    ///////////////USER///////////////////
    //////////////////////////////////////


    //POST

    public function updateToken($id, $token) {
        $stmt = $this->db->prepare("UPDATE users SET token='$token' WHERE id='$id'");
        $stmt->execute();
        return true;
    }

    public function registrationUser($login, $password, $token, $nickname){
        $stmt = $this->db->prepare("INSERT INTO `users` ( `login`, `password`,`token`, `nickname`, `money`, `bank`) VALUES ('$login','$password','$token','$nickname', 1000, 0)");
        $stmt->execute();
        $stmt->fetch();
        $stmt2 = $this->db->prepare("INSERT INTO `stats` ( `win`, `loss`, `biggest_win`, `biggest_loss`) VALUES (0,0,0,0)");
        $stmt2->execute();
        return true;
    }

    public function transferMoney($id, $activeMoney, $bank){
        $stmt = $this->db->prepare("UPDATE `users` SET `money`=$activeMoney,`bank`=$bank WHERE `id` = $id");
        $stmt->execute();
        return true;
    }

    //GET

    public function getUserByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE login='$login'");
        $stmt->execute();
        if($stmt){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
    
    public function getUserByToken($token){
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE token='$token'");
        $stmt->execute();
        if($stmt){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function getUserById($id){
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE id='$id'");
        $stmt->execute();
        if($stmt){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }


    ////////////////////////////////////////////////
    ///////////////////TABLE////////////////////////
    ////////////////////////////////////////////////

    //POST

    public function deleteTableById($id){
        $stmt = $this->db->prepare("DELETE FROM `tables` WHERE id='$id'");
        $stmt->execute();
        return true;
    }

    public function createTable($name, $quant, $rates, $password, $userId){
        if($password){
            $stmt = $this->db->prepare("INSERT INTO `tables`(`name`, `quantity_players`, `active_players_id`, `rates`, `password`) VALUES ('$name','$quant','$userId','$rates','$password')");
            $stmt->execute();
        }
        else{
            $stmt = $this->db->prepare("INSERT INTO `tables`(`name`, `quantity_players`, `active_players_id`, `rates`) VALUES ('$name','$quant','$userId','$rates')");
            $stmt->execute();
        }
        return true;
    }

    public function connectToTable($userId, $tableId){
        $players = $this->getTableById($tableId)['active_players_id'];
        if($players){
            $players = $players." $userId";
            $stmt = $this->db->prepare("UPDATE `tables` SET `active_players_id`='$players' WHERE id='$tableId'");
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function disconnectFromTable($userId, $tableId){
        $players = $this->getTableById($tableId)['active_players_id'];
        if($players){
            $players = explode(" ",$players);
            for($i = 0; $i < count($players); $i++){
                if($players[$i] == $userId){
                    array_splice ($players, $i ,1);
                }
            }
            $players = implode(" ", $players);
            $stmt = $this->db->prepare("UPDATE `tables` SET `active_players_id`='$players' WHERE id='$tableId'");
            $stmt->execute();
            return true;
        }
        return false;
    }



    //GET

    public function getAllTables() {
        $stmt = $this->db->prepare("SELECT * FROM tables");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTableById($id){
        $stmt = $this->db->prepare("SELECT * FROM tables WHERE id='$id'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>