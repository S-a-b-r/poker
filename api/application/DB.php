<?php
    $link = mysqli_connect('poker','root','root','test_1_db');
    if(mysqli_connect_errno()){
        echo('Ошибка в подключении к БД('.mysqli_connect_errno().'): '. mysqli_connect_error());
        exit();
    }

    class DB{
        function get_name($link){
            $sql = 'SELECT * FROM testing_db';
            $result = mysqli_query($link,$sql);
            $data = mysqli_fetch_all($result, 1);

            return $data;
        }
    }

    $db = new DB;
    print_r($db->get_name($link));
?>