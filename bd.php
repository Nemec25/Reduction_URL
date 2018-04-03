<?php
$mysqli = new mysqli ("localhost", "my_user" , "my_password" , "my_db" );
$mysqli->query ("SET NAMES 'utf8'");
$mysqli->set_charset("utf8");
?>