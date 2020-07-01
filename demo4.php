<?php
session_start();
include 'dbconfig.php';

$ScNo= $_SESSION['ScNo'];
$buyer= $_SESSION["buyer"];
$idate=$_SESSION["idate"];
$rdate= $_SESSION["rdate"];
$edate=$_SESSION["edate"];
$validity=$_SESSION["validity"];

$sdate=$_SESSION["sdate"];
$mlc=$_SESSION["mlc"];
$lcdate=$_SESSION["lcdate"];
$remarks=$_SESSION["remarks"];	 

$comID=$_SESSION['companyID'];

echo $ScNo;
$sql6="SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `CompanyID`='$comID'";
 $sqldata= mysqli_query($link, $sql6);
while($row = mysqli_fetch_array($sqldata))
{
$qpc=$row['Qty In Pcs'];
$tpric=$row['Factory Value'];
$qpcs=$qpcs+$qpc;
$tprice=$tprice+$tpric;
}





// $qpcs=$_POST["QPCS"];
// $tprice=$_POST["TPrice"];

date_default_timezone_set('Bangladesh/Dhaka');

$uprice=$tprice/$qpcs;
$date1=date_create($edate);
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date2,$date1);
$valDiff=$diff->format("%R%a days");
$uprice=$tprice/$qpcs;
$sql = "INSERT INTO `order`(`CompanyID`,`Sales Contact No`, `Version`,`Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
VALUES ('$comID','$ScNo',0,'$buyer','$idate','$rdate','$rdate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";

$sql3 = "INSERT INTO `orderFinal`(`CompanyID`,`Sales Contact No`,`Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
VALUES ('$comID','$ScNo','$buyer','$idate','$rdate','$rdate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";


if ($link->query($sql) === TRUE) {


$sql2=mysqli_query($link,$sql);
$sql4=mysqli_query($link,$sql3);

$_SESSION["ScNo"]=$ScNo;
$_SESSION["Buyer"]=$buyer;
 header("Location:index.php");
    
} 
else
	echo"NOT DONE";
	

// else { echo "seats not availabl";}


?>
