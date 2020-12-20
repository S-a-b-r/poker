<?php
    header('Access-Control-Allow-Origin: *');
    error_reporting(E_ALL & ~E_NOTICE);
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
                case 'checkcombination': return $app->checkCombination();//for admin
                case 'winner': return $app->winner($params);//for admin
                case 'loser': return $app->loser($params);//for admin
                case 'startgame': return $app->startGame($params);//Написать доки
                case 'fold': return $app->fold($params);//Написать доки
                case 'check': return $app->check($params);//Написать доки
                

                //GET
                case 'getalltables': return $app ->getAllTables();
                case 'getuserbytoken': return $app ->getUserByToken($params);//for admin
                case 'getuserbyid': return $app->getUserById($params);
                case 'gettablebyid': return $app ->getTableById($params);
                case 'getrandomcard': return $app->getRandomCard($params);//for admin
                case 'getquantplayersontable': return $app->getQuantPlayersOnTable($params);
                case 'getstatsbyid': return $app->getStatsById($params);
                case 'getgame': return $app->getGame($params);//написать доки
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