<?php
session_start();
include 'dbconfig.php';

$ScNo= $_GET['ScNoCheck'];
$comID=$_SESSION["companyID"];

echo $ScNo;
$_SESSION["ScNoShow"]=$ScNo;

$sql = " SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `CompanyID`='$comID'" or die(mysql_error());

         
 $sqldata= mysqli_query($link, $sql);
while($row = mysqli_fetch_array($sqldata))
{
$max=$row['Version'];
}
$_SESSION["Version"]=$max[0];


$sqlCheck="SELECT * FROM `orderDetail` WHERE `Sc No` LIKE '$ScNo' AND `CompanyID`='$comID'";
$sqlCheckData= mysqli_query($link, $sqlCheck) or die ('error');
$count1 = mysqli_num_rows($sqlCheckData);
if ($count1>0)
{
	$_SESSION["showFound"]=true;
 header("Location:showOrder.php?show_state=3");
}
else
{
	$_SESSION["showFound"]=false;	
 header("Location:showOrder.php?show_state=3");	
}
 


?>