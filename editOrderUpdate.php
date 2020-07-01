<?php
session_start();
include 'dbconfig.php';

$ScNo= $_SESSION['ScNoEdit'];
$buyer= $_POST['Buyer'];
$idate=$_POST['IDate'];
$rdate= $_POST['RDate'];
$edate=$_POST["EDate"];
$validity=$_POST["Validity"];
$qpcs=$_POST["QPCS"];
$tprice=$_POST["TPrice"];
$sdate=$_POST["SDate"];
$mlc=$_POST["MLc"];
$lcdate=$_POST["LCDate"];
$remarks=$_POST["remarks"];	 
$version=$_SESSION['Version'];

$comID=$_SESSION["companyID"];

if($buyer==null OR $idate==null OR $rdate==null OR $edate==null OR $tprice==null OR $sdate==null)
{
echo '<script type="text/javascript">'; 
echo 'alert("Entry Missing in the recquired field");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
}

else
{
date_default_timezone_set('Bangladesh/Dhaka');

$uprice=$tprice/$qpcs;
$date1=date_create($edate);
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date2,$date1);
$valDiff=$diff->format("%R%a days");

$sql="UPDATE `order` SET `Sales Contact No`='$ScNo',`Buyer Name`='$buyer',`Issue Date`='$idate',`Recieve Date`='$rdate',`Expire Date`='$edate',`Validity`='$valDiff',`Qntty PCS`='$qpcs',`Unit Price`='$uprice',`Total Price`='$tprice',`Shipment Date`='$sdate',`Master LC`='$mlc',`LC Date`='$lcdate',`Remarks`='$remarks' 
WHERE `Sales Contact No`='$ScNo' AND `Version`='$version' AND `CompanyID`='$comID'";
// $sql = "INSERT INTO `order`(`Sales Contact No`, `Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
// VALUES ('$ScNo','$buyer','$idate','$rdate','$edate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";

if ($link->query($sql) === TRUE) {


$sql2=mysqli_query($link,$sql);
$_SESSION["ScNo"]=$ScNo;
$_SESSION["Buyer"]=$buyer;
 header("Location:editOrder.php");
    
} 
else
	echo"NOT DONE";
	
}

// else { echo "seats not availabl";}


?>
