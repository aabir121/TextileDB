<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNo'];
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


$comID=$_SESSION['companyID'];
echo $comID;
// if($ScNo==null OR $buyer==null OR $idate==null OR $rdate==null OR $edate==null OR $tprice==null OR $sdate==null)
// {
// echo '<script type="text/javascript">'; 
// echo 'alert("Entry Missing in the recquired field");'; 
// echo 'window.location.href = "index.php";';
// echo '</script>';
// }

// else
// {
// date_default_timezone_set('Bangladesh/Dhaka');

// $uprice=$tprice/$qpcs;
// $date1=date_create($edate);
// $date2=date_create(date('Y-m-d'));
// $diff=date_diff($date2,$date1);
// $valDiff=$diff->format("%R%a days");
// $sql = "INSERT INTO `order`(`CompanyID`,`Sales Contact No`, `Version`,`Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
// VALUES ('$comID','$ScNo',0,'$buyer','$idate','$rdate','$rdate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";

// $sql3 = "INSERT INTO `orderFinal`(`CompanyID`,`Sales Contact No`,`Buyer Name`, `Issue Date`, `Recieve Date`,`Expire Date`,`Validity`,`Qntty PCS`,`Unit Price`,`Total Price`,`Shipment Date`,`Master LC`,`LC Date`,`Remarks`) 
// VALUES ('$comID','$ScNo','$buyer','$idate','$rdate','$rdate','$valDiff','$qpcs','$uprice','$tprice','$sdate','$mlc','$lcdate','$remarks')";


// if ($link->query($sql) === TRUE) {


// $sql2=mysqli_query($link,$sql);
// $sql4=mysqli_query($link,$sql3);

// $_SESSION["ScNo"]=$ScNo;
// $_SESSION["Buyer"]=$buyer;
 // header("Location:index.php");
    
// } 
// else
	// echo"NOT DONE";
	
// }

// else { echo "seats not availabl";}


?>
