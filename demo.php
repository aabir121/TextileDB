
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];

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
   <li class='active'>
   
   <div class="dropdown" style="float:right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Order
  <span class="caret"></span></button>
  <ul class="dropdown-menu dropdown-menu-left" id="login" >
<li role="presentation"><a role="menuitem" tabindex="-1" href="index.php">Add Order</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="editOrder.php">Edit Order</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dltOrder.php">Delete Order</a></li>
  
</ul>
</div>
   
   
   
   
   
   </li>
   <li><a href='importFirst.php'><span>Import</span></a></li>
   <li ><a href='export.php'><span>Export</span></a></li>
   <li class='last'><a href='report.php'><span>Report</span></a></li>

   </ul>
   </div>

<center>
<div  class="table-responsive" >
	<table style="margin-top:5%;width:90%">
	<form	action="demo1.php" method="post">

	<thead>
	<tr>
	<th colspan="100%" rowspan="2">Place Order</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>
			<label for="text">Sales Contact No.</label>
		<input type="text" name="ScNo" >
	</td>	
	<td>
	<label for="text">Buyer Name</label>
		<input type="text" name="Buyer">		
	</td>
	<td>
			<label for="text">Issue Date</label>
		<input type="date" name="IDate"></td>
		</tr>
		
		<tr>
	<td>
	<label for="text">Receive Date</label>
		<input type="date" name="RDate">
	</td>
	<td>
			<label for="text">Expire Date</label>
		<input type="date" name="EDate" >
	</td>
	<td>
		<label for="text">Shipment Date</label>
		<input type="date" name="SDate">
		</td>
</tr>
	
	<tr>
	
			<td>
		<label for="text">Master LC</label>
		<input type="text" name="MLc">
		</td>
	<td colspan="2">
	<label for="text">LC Date</label>
			<input type="date" name="LCDate">
	</td>	
	</tr>
	<tr>

	<td colspan="4">
		<label for="text">Remarks</label>
		<input type="text" style="width:80%"name="remarks">
		</td>

	
	</tr>
	<tr>
	
	
	
	
	
	<tr>
	<center>
	<td colspan="3"><input type="submit" class="btn btn-success" value="Add">
	</center>
	</td>
	
	</tbody>
</table>





</div>















</center>

</body>
<html>
