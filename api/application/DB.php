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

    public function getAllTables() {
        $stmt = $this->db->prepare("SELECT * FROM tables");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrationUser($login,$password,$nickname){
        $stmt = $this->db->prepare("INSERT INTO `users` ( `login`, `password`, `nickname`, `money`) VALUES ('$login','$password','$nickname', 1000)");
        $stmt->execute();
        $stmt->fetch();
        $stmt2 = $this->db->prepare("INSERT INTO `stats` ( `win`, `loss`, `biggest_win`, `biggest_loss`) VALUES (0,0,0,0)");
        $stmt2->execute();
        return true;
    }

    //public function getTablesById($id) {
    //    $table = $this->connect->prepare("SELECT * FROM tables WHERE id =".$id);
    //    $table->execute();
    //    return $table->fetch();
    //}

    //public function getUserByToken($token) {
    //    $stmt = $this->conn->prepare("SELECT * FROM users WHERE token='$token'");
    //    $stmt->execute();
    //    return $stmt->fetch();
    //}

    //public function updateToken($id, $token) {
    //    $stmt = $this->conn->prepare("UPDATE users SET token='$token' WHERE id=$id");
    //    $stmt->execute();
    //    return true;
    //}



    //public function createUser($nickname, $login, $hash, $token) {
    //    if ($nickname && $login && $hash && $token) {
    //        $stmt = $this->conn->prepare("SELECT * FROM users WHERE login='$login'");
    //        $stmt->execute();
    //        if (!$stmt->fetch()) {
    //            $stmt = $this->conn->prepare("INSERT INTO `users` (`name`, `login`, `password`, `token`) VALUES ('$nickname', '$login', '$hash', '$token')");
    //            $stmt->execute();
    //            return $token;
    //        }
    //    }
    //    return false;
    //}

    //public function getHumanByUserId($userId) {
    //    return (object) [
    //        'x' => 1,
    //        'y' => 1
    //    ];
    //}


}
?>