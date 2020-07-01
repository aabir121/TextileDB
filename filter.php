<?php
session_start();
include "dbconfig.php";

$_SESSION["filter_buyer"]=$_POST["filter_buyer"];
$_SESSION["filter_state"]=$_POST["filter_state"];


echo $_SESSION["filter_buyer"];
echo $_SESSION["filter_state"];
header("Location:showorder.php?filter_state=2");

?>