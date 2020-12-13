<?php
    header('Access-Control-Allow-Origin: *');
    error_reporting(-1);
    require_once('application/Application.php');
    //comment from grisha

    function router($params){
        $method = $params['method'];
        if($method){
            $app = new Application();
            switch($method){
                //POST
                case 'registration': return $app ->registration($params);
                case 'login': return $app ->login($params);
                case 'logout': return $app ->logout($params);
                case 'createtable': return $app ->createTable($params);
                case 'deletetablebyid': return $app ->deleteTableById($params);//for admin
                case 'connecttotable': return $app->connectToTable($params);
                case 'disconnectfromtable': return $app->disconnectFromTable($params);
                case 'transfertomoney': return $app->transferToMoney($params);
                case 'transfertobank': return $app->transferToBank($params);
                case 'checkcombination': return $app->checkCombination();//Написать доки
                case 'winner': return $app->winner($params);//Написать доки
                case 'loser': return $app->loser($params);//Написать доки
                case 'startgame': return $app->startGame($params);

                //GET
                case 'getalltables': return $app ->getAllTables();
                case 'getuserbytoken': return $app ->getUserByToken($params);//for admin
                case 'getuserbyid': return $app->getUserById($params);
                case 'gettablebyid': return $app ->getTableById($params);
                case 'getrandomcard': return $app->getRandomCard($params);//обновить доки!
                case 'getquantplayersontable': return $app->getQuantPlayersOnTable($params);
                case 'getstatsbyid': return $app->getStatsById($params);
            }
        }
        return false;
    }

    function answer($data){
        if(gettype($data) == 'array'){
            if($data[0]=='error'){
                return array('result'=>'error', 'data'=>'error'.$data[1]);
            }
            return array('result'=>'ok', 'data'=>$data);
        }
        else if(!$data){
            return array('result'=>'error');
        }
        return array('result'=>'ok', 'data'=>$data);
    }

    if($_GET){
        echo(json_encode(answer(router($_GET))));
    }
    elseif($_POST){
        echo(json_encode(answer(router($_POST))));
    }
?>