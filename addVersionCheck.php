<?php
session_start();
include 'dbconfig.php';



$ScNo= $_SESSION['ScNoEdit'];
$buyer= $_SESSION['buyer'];
$idate=$_SESSION['idate'];

$_SESSION["rdate"]= $_POST['RDate'];
$_SESSION["edate"]=$_POST["EDate"];
$_SESSION["validity"]=$_POST["Validity"];
$_SESSION["sdate"]=$_POST["SDate"];
$_SESSION["mlc"]=$_POST["MLc"];
$_SESSION["lcdate"]=$_POST["LCDate"];
$_SESSION["remarks"]=$_POST["remarks"];
$comID=$_SESSION["companyID"];

$sql = " SELECT * FROM `order` WHERE `Sales Contact No`='$ScNo' AND `CompanyID`='$comID'" or die(mysql_error());

         // $row = mysql_fetch_array($sql) or die(mysql_error());

 $sqldata= mysqli_query($link, $sql);
while($row = mysqli_fetch_array($sqldata))
{
$max=$row['Version'];
}
$_SESSION["editVersion"]=$max[0]+1;


if($_SESSION["ScNoEdit"]==null OR $_SESSION["buyer"]==null OR $_SESSION["idate"]==null OR $_SESSION["rdate"]==null OR $_SESSION["edate"]==null  OR $_SESSION["sdate"]==null)
{
echo '<script type="text/javascript">'; 
echo 'alert("Entry Missing in the recquired field");'; 
echo 'window.location.href = "addVersion.php";';
echo '</script>';
}

else
{

header("Location:addVersionNext.php");
}
?>