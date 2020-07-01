<?php
session_start();

include 'dbconfig.php';

$_SESSION["companyName"]="Home";

$id = $_SESSION["currid"];
$_SESSION["loggedin"]=false; 

header("Location: index.php");


?>