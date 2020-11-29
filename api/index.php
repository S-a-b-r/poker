<?php
    error_reporting(-1);
    require_once('application/Application.php');

    function router($params){
        $method = $params['method'];
        if($method){
            $app = new Application();
            switch($method){
                //POST
                case 'registration': return $app ->registration($params);
                case 'login': return $app ->login($params);
                case 'createtable': return $app ->createTable($params);
                case 'deletetablebyid': return $app ->deleteTableById($params);//test
                case 'logout': return $app ->logout($params);
                case 'connecttotable': return $app->connectToTable($params);
                case 'disconnectfromtable': return $app->disconnectFromTable($params);

                //GET
                case 'getalltables': return $app ->getAllTables();
                case 'getuserbytoken': return $app ->getUserByToken($params);
                case 'gettablebyid': return $app ->getTableById($params);
                case 'getrandomcard': return $app->getRandomCard();
                case 'getquantplayersontable': return $app->getQuantPlayersOnTable($params);

            }
        }
        return false;
    }

    function answer($data){
        if($data){
            return array('result'=>'ok', 'data'=>$data);
        }
        return array('result'=>'error');
    }
    if($_GET){
        echo(json_encode(answer(router($_GET))));
    }
    elseif($_POST){
        echo(json_encode(answer(router($_POST))));
    }
?>