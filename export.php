<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
$ScNo=$_SESSION["ScNo"];
?>




<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
				<link rel="stylesheet" href="table.css">
	<script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
   
	
	
	
	
	
</head>
<body >
	<div class="table-respinsive">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="6">Order Details</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>Sales Contact No</td>	
	<td>Buyer Name</td>
	<td>Issue Date</td>
	<td>Receive Date</td>
	
	</tr>
	<?php
	$sqlget="SELECT * FROM `order` WHERE `Sales Contact No`='$ScNo' ";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Sales Contact No'] . "</td>";
echo "<td>" . $row['Buyer Name'] . "</td>";
echo "<td>" . $row['Issue Date'] . "</td>";
echo "<td>" . $row['Recieve Date'] . "</td>";

echo "</tr>";
}
mysqli_close($con);


	?>
	
	</tbody>
</table>

	
	
	

</div>



	<div class="table-respinsive">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="6">Import</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>Sales Contact No</td>	
	<td>Buyer Name</td>
	<td>Date</td>
	<td>Supplier</td>
	
	</tr>
	<?php
	$sqlget="SELECT * FROM `import` WHERE `Number`='$ScNo' ";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Number'] . "</td>";
echo "<td>" . $row['Buyer'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['Supplier'] . "</td>";

echo "</tr>";
}
mysqli_close($con);


	?>
	
	</tbody>
</table>

	
	
	

</div>



















<h3> Export</h3>
<form	action="next.php" method="post">

		<label for="text">Number</label>
		<input type="text" name="ScNo" >
		<label for="text">Buyer</label>
		<input type="text" name="Buyer">
		<label for="text">Date</label>
		<input type="date" name="Date">
		<label for="text">Supplier</label>
		<input type="date" name="Supplier">
	<input type="submit" class="btn btn-success" value="Add">
		      		  
</form>


</body>
<html>
 