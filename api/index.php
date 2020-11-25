<?php
    error_reporting(-1);
    require_once('application/Application.php');

    function router($params){
        $method = $params['method'];
        if($method){
            $app = new Application();
            switch($method){
                case 'registration': return $app ->registration($params);
                case 'login': return $app ->login($params);
                case 'getalltables': return $app ->getAllTables();
                case 'createtable': return $app ->createTable($params);
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

    echo(json_encode(answer(router($_GET))));
?>