<?php
session_start();

include 'dbconfig.php';




// $_SESSION["LOGGEDIN"]="true"; 

    // Get the login credentials from user

    $username = $_POST['company'];

    $userpassword = $_POST['password'];

echo $username;
echo $userpassword;     


   

 

    // Check the users input against the DB.
	
$sql = mysqli_query($link, "SELECT * FROM `company` WHERE `CompanyName` = '$username' and `Password`='$userpassword'");
$count = mysqli_num_rows($sql);

if($count > 0){

$sqlget = "SELECT * FROM `company` WHERE `CompanyName` = '$username' and `Password`='$userpassword'";
$sqldata= mysqli_query($link, $sqlget) or die ('error');

while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {

  $_SESSION["companyID"] = $row['CompanyID'];
  $_SESSION["companyName"] = $row['CompanyName'];
  $_SESSION["companyAdrs"] = $row['Address'];
  $_SESSION["companyCountry"] = $row['Country'];
     $_SESSION["companyState"] = $row['State'];
  $_SESSION["companyEmail"] = $row['Email'];
echo "okay";   
   }
$_SESSION["loggedin"]=true; 

header("Location: index.php");
} else{
$_SESSION["loggedin"]=false;; 

  header("Location: index.php");  
}

?>