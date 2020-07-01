<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNoCheck'];

echo $ScNo;
$sql = "SELECT * FROM `order` WHERE `Sales Contact No` LIKE '$ScNo'";
$sqldata= mysqli_query($link, $sql) or die ('error');
$count = mysqli_num_rows($sqldata);

if($count > 0){
	
$sql2=mysqli_query($link,$sql) or die ('error');

while ($row=mysqli_fetch_array($sql2,MYSQLI_ASSOC)) {
$_SESSION["ScNo"]=$ScNo;
$_SESSION["ScNoMatch"]=true;
// echo"Match";
  $_SESSION["firstTime"]=true; 
}
}

else
{
		$_SESSION["ScNoMatch"]=false;
}	
	

header("Location:import.php");
 


?>