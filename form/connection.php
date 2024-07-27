<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "myform";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    echo mysqli_connect_error();
}