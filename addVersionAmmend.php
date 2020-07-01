<?php
session_start();
include 'dbconfig.php';

$ScNo= $_SESSION['ScNoEdit'];
$buyer= $_SESSION['buyer'];
$idate=$_SESSION['idate'];
$rdate= $_SESSION['rdate'];
$edate=$_SESSION["edate"];
$validity=$_SESSION["validity"];

$sdate=$_SESSION["sdate"];
$mlc=$_SESSION["mlc"];
$lcdate=$_SESSION["lcdate"];
$remarks=$_SESSION["remarks"];	 


$comID=$_SESSION["companyID"];

echo "ScNo: ".$ScNo;

$qpcs=0;
$tprice=0;
$version=$_SESSION["editVersion"];

$sql6="SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `Version`='$version' AND `CompanyID`='$comID'";
 $sqldata= mysqli_query($link, $sql6);
while($row = mysqli_fetch_array($sqldata))
{
$qpc=$row['Qty In Pcs'];
$tpric=$row['Factory Value'];
$qpcs=$qpcs+$qpc;
$tprice=$tprice+$tpric;
}
echo "\nQPCS: ".$qpcs;
echo "\nTPRC: ".$tprice;

date_default_timezone_set('Bangladesh/Dhaka');

$uprice=$tprice/$qpcs;
$date1=date_create($edate);
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date2,$date1);
$valDiff=$diff->format("%R%a days");

$sql = "INSERT INTO `order`(`CompanyID`,`Sales Contact No`, `Version`,`Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
VALUES ('$comID','$ScNo','$version','$buyer','$idate','$rdate','$rdate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";


	$sqlget="SELECT * FROM `orderFinal` WHERE `Sales Contact No`='$ScNo' AND `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
$QPcsFinal=$row['Qntty PCS'] ;
$UPriceFinal= $row['Unit Price'] ;
$TPriceFinal=$row['Total Price'];
}

	








$sql3="UPDATE `orderFinal` SET `Sales Contact No`='$ScNo',`Buyer Name`='$buyer',`Issue Date`='$idate',`Recieve Date`='$rdate',`Expire Date`='$edate',
`Validity`='$valDiff',`Qntty PCS`='$qpcs'+'$QPcsFinal',`Unit Price`=('$uprice'+'$UPriceFinal')/2,`Total Price`='$tprice'+'$TPriceFinal',`Shipment Date`='$sdate',`Master LC`='$mlc',`LC Date`='$lcdate',
`Remarks`='$remarks' WHERE `Sales Contact No`='$ScNo' AND `CompanyID`='$comID'";




if ($link->query($sql) === TRUE) {


$sql2=mysqli_query($link,$sql);
$sql4=mysqli_query($link,$sql3);

$_SESSION["ScNo"]=$ScNo;
$_SESSION["Buyer"]=$buyer;
 header("Location:editOrder.php");
    
} 
else
	echo"NOT DONE";
	



?>
