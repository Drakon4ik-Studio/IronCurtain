<?php
    date_default_timezone_set('Asia/Novosibirsk');
    /*$connectsql = mysqli_connect('localhost', 'WebClient', '89698747q');
    if (!$connectsql) {
        echo 'Ошибка подключения к бд!';
    } else {
        echo 'Успешно!';
    }*/
    require_once "libs/rb.php";
    R::setup( 'mysql:host=localhost;dbname=ironcurtain', 'root', '' );
    session_start();
