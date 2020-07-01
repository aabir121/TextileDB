<?php
session_start();
include 'dbconfig.php';

$_SESSION["ScNo"]= $_POST['ScNo'];
$_SESSION["buyer"]= $_POST['Buyer'];
$_SESSION["idate"]=$_POST['IDate'];
$_SESSION["rdate"]= $_POST['RDate'];
$_SESSION["edate"]=$_POST["EDate"];
$_SESSION["validity"]=$_POST["Validity"];
$_SESSION["sdate"]=$_POST["SDate"];
$_SESSION["mlc"]=$_POST["MLc"];
$_SESSION["lcdate"]=$_POST["LCDate"];
$_SESSION["remarks"]=$_POST["remarks"];




if($_SESSION["ScNo"]==null OR $_SESSION["buyer"]==null OR $_SESSION["idate"]==null OR $_SESSION["rdate"]==null OR $_SESSION["edate"]==null  OR $_SESSION["sdate"]==null)
{
echo '<script type="text/javascript">'; 
echo 'alert("Entry Missing in the recquired field");'; 
echo 'window.location.href = "demo.php";';
echo '</script>';
}

else
{

header("Location:demo2.php");
}
?>