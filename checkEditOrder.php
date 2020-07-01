<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNoCheck'];

echo $ScNo;
$_SESSION["ScNoEdit"]=$ScNo;
$comID=$_SESSION["companyID"];


$sqlCheck="SELECT * FROM `order` WHERE `Sales Contact No` LIKE '$ScNo' AND `CompanyID`='$comID'";
$sqlCheckData= mysqli_query($link, $sqlCheck) or die ('error');
$count1 = mysqli_num_rows($sqlCheckData);
if ($count1>0)
{
 header("Location:editOrderSelected.php");
}
else
{
$_SESSION["editNotFound"]=true;
 header("Location:editOrder.php");	
}
 


?>