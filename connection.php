<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'logindb';

if(!$conn = mysqli_connect($host, $user, $pass, $db)){
    die("failed to connect");
}

//test
?>