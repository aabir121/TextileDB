<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNoCheck'];

echo $ScNo;
$comID=$_SESSION["companyID"];

$sql = "DELETE FROM `order` AND `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sql) or die ('error');
$count = mysqli_num_rows($sqldata);


header("Location:dltOrder.php");

 


?>