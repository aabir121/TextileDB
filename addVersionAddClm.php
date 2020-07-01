<?php
session_start();
include 'dbconfig.php';

$ScNo= $_SESSION["ScNoEdit"];


$pono=$_POST["PONo"];
$mano=$_POST["MANo"];
$type=$_POST["Type"];
$qpcs=$_POST["QPcs"];
$uprice=$_POST["UPrice"];
// $fvalue=$_POST["FValue"];
$comID=$_SESSION["companyID"];

$version=$_SESSION["editVersion"];

// echo "Sc".$ScNo;
// echo $_SESSION["ScNoEdit"];
// echo $_SESSION["editVersion"];
$sql = " SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `Version`='$version' AND `CompanyID`='$comID'"  or die(mysql_error());

         // $row = mysql_fetch_array($sql) or die(mysql_error());

 $sqldata= mysqli_query($link, $sql);
while($row = mysqli_fetch_array($sqldata))
{
$max=$row['Sl No'];
echo $max;
}
echo $max[0];
// echo $ScNo;


$fvalue=$qpcs*$uprice;

$sql3 = "INSERT INTO `orderDetail`(`CompanyID`,`Sc No`,`Version`, `Sl No`, `PO No.`,`Model/Article No`,`Type`,`Qty In Pcs`,`Unit Price`,`Factory Value`) 
VALUES ('$comID','$ScNo','$version','$max[0]'+1,'$pono','$mano','$type','$qpcs','$uprice','$fvalue')";


if ($link->query($sql3) === TRUE) {


$sql4=mysqli_query($link,$sql3);

 header("Location:addVersionNext.php");
    
} 
else
	echo"NOT DONE";
	


// else { echo "seats not availabl";}


?>
