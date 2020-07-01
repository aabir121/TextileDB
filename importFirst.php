<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
$ScNo=$_SESSION["ScNo"];
$_SESSION["firstTime"]=true;
?>




<!doctype html>
<html lang=''>
<head>
        <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="header.css">
   <script src="js/jquery-min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
	<link rel="stylesheet" href="table.css">
	
	
	
	
	
</head>
<body style="background-color:#C5FBFF;">

<div id='cssmenu'>

<ul>
   <li><a href='index.php'><span>Order</span></a></li>
   <li class='active'><a href='importFirst.php'><span>Import</span></a></li>

   <li class='last'><a href='export.php'><span>Export</span></a></li>
   </div>
   
   
 <div style="margin:5%;width:50%;background:#C1EAEE;border-radius:10px;padding:2%">
<form action="checkImport.php" method="post">
<label for="text"> Sales Contact No</label>
<input type="text" name="ScNoCheck">
<input type="submit" class="btn btn-success" value="Show">
		      		  
</form>
</div>

</body>
<html>
 