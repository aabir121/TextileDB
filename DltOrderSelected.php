<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNoCheck'];

echo $ScNo;


$comID=$_SESSION["companyID"];

$sqlCheck="SELECT * FROM `order` WHERE `Sales Contact No` LIKE '$ScNo' AND `CompanyID`='$comID'";
$sqlCheckData= mysqli_query($link, $sqlCheck) or die ('error');
$count1 = mysqli_num_rows($sqlCheckData);
if ($count1>0)
{
$sql = "DELETE FROM `order` WHERE `Sales Contact No` LIKE '$ScNo' AND `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sql) or die ('error');
$count = mysqli_num_rows($sqldata);

}
else
{
$_SESSION["dltNotFound"]=true;
	
}
 header("Location:dltOrder.php"); 


?>