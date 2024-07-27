<?php

include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM admission WHERE id = '$id'";

if(mysqli_query($conn, $sql)){
    echo "Data Deleted";
    header('Location: view.php');
}