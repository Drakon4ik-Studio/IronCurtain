<?php
    date_default_timezone_set('Asia/Novosibirsk');
    require_once "libs/rb-mysql.php";
    R::setup( 'mysql:host=localhost;dbname=ironcurtain', 'WebClient', '89698747q' );
    session_start();
