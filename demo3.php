<?php
session_start();
include 'dbconfig.php';

$ScNo= $_SESSION["ScNo"];


$pono=$_POST["PONo"];
$mano=$_POST["MANo"];
$type=$_POST["Type"];
$qpcs=$_POST["QPcs"];
$uprice=$_POST["UPrice"];
// $fvalue=$_POST["FValue"];

$comID=$_SESSION['companyID'];
echo $comID;
echo "scno:".$ScNo;


$sql = "SELECT * FROM `orderdetail` WHERE `companyID` = '$comID' AND `Sc No` = '$ScNo'";

// $sql = "SELECT * FROM `orderdetail` WHERE `Sc No`='$ScNo' AND `companyID`='$comID'" ;
$result = mysqli_query($link,$sql);
         
$count = mysqli_num_rows($result);
echo "count:".$count;

if($count > 0){
 $sqldata= mysqli_query($link, $sql);
while($row = mysqli_fetch_array($sqldata))
{
$max=$row['Sl No'];
$version=$row['Version'];
}
}
else {
	$max[0]=0;
 // echo $max[0];
}
	// echo $max[0];
// echo $ScNo;

$fvalue=$qpcs*$uprice;

$sql3 = "INSERT INTO `orderdetail`(`companyID`,`Sc No`,`Version`, `Sl No`, `PO No.`,`Model/Article No`,`Type`,`Qty In Pcs`,`Unit Price`,`Factory Value`) 
							VALUES ('$comID','$ScNo','0','$max[0]'+1,'$pono','$mano','$type','$qpcs','$uprice','$fvalue')" or die(mysql_error());


if ($link->query($sql3) === TRUE) {
echo"update";

$sql4=mysqli_query($link,$sql3);

 header("Location:demo2.php");
    
} 
else
	echo"NOT DONE";
	


// else { echo "seats not availabl";}


?>
