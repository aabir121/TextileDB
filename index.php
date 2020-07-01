
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
include('header.html'); 
// include_once("sessionState.php");
$_SESSION["loggedin"]=$_SESSION["loggedin"];


$login=$_SESSION["loggedin"];

?>

<!doctype html>
<html lang=''>
<head>
        <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
	<link rel="stylesheet" href="table.css">



	
	
	
</head>
<body>











<div style="float:right;width:80%">
<?php 

// $_SESSION["loggedin"]=false;
if($login==true):?>



<div  class="table-responsive">
	<table style="margin-top:2%;width:100%;background:#FAFAFA">
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
		<input type="text" name="ScNo"required >
	</td>	
	<td>
	<label for="text">Buyer Name</label>
		<input type="text" name="Buyer"required>		
	</td>
	<td>
			<label for="text">Issue Date</label>
		<input type="date" name="IDate"required></td>
		</tr>
		
		<tr>
	<td>
	<label for="text">Receive Date</label>
		<input type="date" name="RDate"required>
	</td>
	<td>
			<label for="text">Expire Date</label>
		<input type="date" name="EDate"required >
	</td>
	<td>
		<label for="text">Shipment Date</label>
		<input type="date" name="SDate"required>
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

	<td colspan="5">
		<label for="text">Remarks</label>
		<textarea type="text" style="width:80%"name="remarks"></textarea>
		
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


<?php else :?>

<?php 

include("mainScreen.php");?>
	
	<?php endif?>





</div>


















</body>
<html>
