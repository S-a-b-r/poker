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
                case 'transfermoney': return $app->transferMoney($params);//написать доки

                //GET
                case 'getalltables': return $app ->getAllTables();
                case 'getuserbytoken': return $app ->getUserByToken($params);//for admin
                case 'getuserbyid': return $app->getUserById($params);
                case 'gettablebyid': return $app ->getTableById($params);
                case 'getrandomcard': return $app->getRandomCard();//test
                case 'getquantplayersontable': return $app->getQuantPlayersOnTable($params);
                case 'getstatsbyid': return $app->getStatsById($params);//написать доки
            }
        }
        return false;
    }

    function answer($data){
        if($data[0]!='error' && $data){
            return array('result'=>'ok', 'data'=>$data);
        }
        else if(!$data){
            return array('result'=>'error');
        }
        return array('result'=>'error', 'data'=>'error'.$data[1]);
    }

    if($_GET){
        echo(json_encode(answer(router($_GET))));
    }
    elseif($_POST){
        echo(json_encode(answer(router($_POST))));
    }
?>