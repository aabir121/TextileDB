<?php
session_start();
include 'dbconfig.php';

$ScNo= $_POST['ScNo'];
$buyer= $_POST['Buyer'];
$date=$_POST['Date'];
$supply= $_POST['Supplier'];

$buyerPrev=$_SESSION["Buyer"];

if($ScNo== $_SESSION["ScNo"]){
$sql = "INSERT INTO `import`(`Number`, `Buyer`, `Date`, `Supplier`) VALUES ('$ScNo','$buyer','$date','$supply')";

if ($link->query($sql) === TRUE) {


$sql2=mysqli_query($link,$sql);
$_SESSION["ScNo"]=$ScNo;
 header("Location:finalImport.php");
    
} 
else
	echo"Sales Contact Number does not match!!!";
	
}
else
	echo "Invalid";
// }
// else { echo "seats not availabl";}



?>