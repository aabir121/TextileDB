<?php
session_start();
include 'dbconfig.php';

$companyname=$_POST["companyName"];
$adrs=$_POST["adrs"];
$country=$_POST["country"];
$state=$_POST["state"];
$email=$_POST["email"];
$password=$_POST["password"]; 

$sql = "INSERT INTO `company`(`CompanyName`, `Address`,`Country`, `State`, `Email`,`Password`) 
VALUES ('$companyname','$adrs','$country','$state','$email','$password')";



if ($link->query($sql) === TRUE) {


$sql2=mysqli_query($link,$sql);

 header("Location:index.php");
    
} 
else
	echo"NOT DONE";

// else { echo "seats not availabl";}


?>
