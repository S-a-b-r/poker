<?php
class DB {
    function __construct() {
        $host = "poker";
        $user = "root";
        $pass = "root";
        $name = "poker";
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

    public function updMoney($userId, $sum){
        $stmt = $this->db->prepare("UPDATE `users` SET `money` = $sum WHERE `id` = $userId ");
        $stmt->execute();
        return true;
    }

    //GET

    public function getUserByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE login='$login'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    
    public function getUserByToken($token){
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE token='$token'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id){
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE id='$id'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }




    ////////////////////////////////////////////////
    ///////////////////STATS////////////////////////
    ////////////////////////////////////////////////



    //POST

    public function updBiggestWin($id, $money){
        $stmt = $this->db->prepare("UPDATE `stats` SET `biggest_win`='$money' WHERE `user_id`='$id'");
        $stmt->execute();
        return true;
    }

    public function updBiggestLoss($id, $money){
        $stmt = $this->db->prepare("UPDATE `stats` SET `biggest_loss`='$money' WHERE `user_id`='$id'");
        $stmt->execute();
        return true;
    }

    public function updWinStats($id, $money){
        $stmt = $this->db->prepare("UPDATE `stats` SET `win`='$money' WHERE `user_id`='$id'");
        $stmt->execute();
        return true;
    }

    public function updLossStats($id, $money){
        $stmt = $this->db->prepare("UPDATE `stats` SET `loss`='$money' WHERE `user_id`='$id'");
        $stmt->execute();
        return true;
    }

    //GET

    public function getStatsById($id){
        $stmt = $this->db->prepare("SELECT * FROM `stats` WHERE user_id='$id'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
        $players = $players." $userId";
        $stmt = $this->db->prepare("UPDATE `tables` SET `active_players_id`='$players' WHERE id='$tableId'");
        $stmt->execute();
        return true;
    }

    public function disconnectFromTable($userId, $tableId){
        $players = $this->getTableById($tableId)['active_players_id'];
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

    public function getQuantPlayersOnTable($id){
        $stmt = $this->db->prepare("SELECT `active_players_id` FROM tables WHERE id='$id'");
        $stmt->execute();
        $players = $stmt->fetch(PDO::FETCH_ASSOC)['active_players_id'];
        $players = explode(" ", $players);
        return count($players);
    }





    ////////////////////////////////////////////////
    ///////////////////PLAYER///////////////////////
    ////////////////////////////////////////////////


    public function createPlayer($userId, $card1, $card2, $combination, $rates){
        $stmt = $this->db->prepare("INSERT INTO `players` (  `user_id`, `card1`, `card2`, `comb`, `rates`) VALUES ('$userId','$card1','$card2','$combination','$rates')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updRatesPlayer($playerId, $sum){
        $stmt = $this->db->prepare("UPDATE `players` SET `rates` = $sum WHERE `id` = $playerId ");
        $stmt->execute();
        return true;
    }


    //GET

    public function getPlayer($id){
        $stmt = $this->db->prepare("SELECT * FROM `players` WHERE `id`=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    ////////////////////////////////////////////////
    ///////////////////GAME/////////////////////////
    ////////////////////////////////////////////////

    public function createGame($tableId, $closeCards, $active,  $player1, $player2, $player3, $player4, $player5, $player6, $player7){
        $stmt = $this->db->prepare("INSERT INTO `games`(`table_id`, `all_rates`, `board_cards`, `close_cards`, `circle`, `start_circle`, `active`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`) VALUES ('$tableId', '0' , null, '$closeCards', '0', '$player1','$active', '$player1', '$player2', '$player3', '$player4', '$player5', '$player6', '$player7')");
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function setActive($gameId, $active){
        $stmt = $this->db->prepare("UPDATE `games` SET `active`='$active' WHERE `id`='$gameId'");
        $stmt->execute();
        return true;
    }

    public function foldPlayer($gameId, $player){
        $stmt = $this->db->prepare("UPDATE `games` SET `$player`='' WHERE `id`='$gameId'");
        $stmt->execute();
        return true;
    }

    public function nextCircle($gameId, $circle){
        $stmt = $this->db->prepare("UPDATE `games` SET `circle`='$circle' WHERE `id`='$gameId'");
        $stmt->execute();
        return true;
    }

    public function setStartCircle($gameId, $playerId){
        $stmt = $this->db->prepare("UPDATE `games` SET `start_circle`='$playerId' WHERE `id`='$gameId'");
        $stmt->execute();
        return true;
    }

    public function updRatesGame($gameId, $sum){
        $stmt = $this->db->prepare("UPDATE `games` SET `all_rates` = $sum WHERE `id` = $gameId ");
        $stmt->execute();
        return true;
    }

    public function setCard($gameId, $boardCards, $closeCards){
        $stmt = $this->db->prepare("UPDATE `games` SET `board_cards`='$boardCards',`close_cards`='$closeCards' WHERE `id`='$gameId'");
        $stmt->execute();
        return true;
    }

    public function deleteGameById($gameId){
        $stmt = $this->db->prepare("DELETE FROM `games` WHERE `id` = $gameId");
        $stmt->execute();
        return true;
    }
    
    public function deletePlayerById($playerId){
        $stmt = $this->db->prepare("DELETE FROM `players` WHERE `id` = $playerId");
        $stmt->execute();
        return true;
    }





    //GET

    public function getGame($id){
        $stmt = $this->db->prepare("SELECT * FROM `games` WHERE `id`=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>