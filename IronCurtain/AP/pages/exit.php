<?php 
	require "../../db.php";
	unset($_SESSION['logged_user']);
    echo '<meta http-equiv="refresh" content="0; url=/"';
    //header('Location: /');