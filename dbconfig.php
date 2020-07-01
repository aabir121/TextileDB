<?php


error_reporting(0);
$link = mysqli_connect("localhost", "root", "", "textiledb"); 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>