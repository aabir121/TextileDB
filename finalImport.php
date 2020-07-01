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
<body style="background-color:#C5FBFF;" >

<div id='cssmenu'>

<ul>
   <li><a href='index.php'><span>Order</span></a></li>
   <li class='active'><a href='importFirst.php'><span>Import</span></a></li>

   <li class='last'><a href='export.php'><span>Export</span></a></li>
   </div>

   
   <center>

	<div class="table-respinsive" style="width:95%">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="100%">Order Details</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>Sales Contact No</td>	
	<td>Buyer Name</td>
	<td>Issue Date</td>
	<td>Receive Date</td>
	<td>Expire Date</td>
	<td>Validity</td>
	<td>Qntty PCS</td>
	<td>Unit Price</td>
	<td>Total Price</td>
	<td>Shipment Date</td>
	
	</tr>
	<?php
	$sqlget="SELECT * FROM `order`";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Sales Contact No'] . "</td>";
echo "<td>" . $row['Buyer Name'] . "</td>";
echo "<td>" . $row['Issue Date'] . "</td>";
echo "<td>" . $row['Recieve Date'] . "</td>";
echo "<td>" . $row['Expire Date'] . "</td>";
echo "<td>" . $row['Validity'] . "</td>";
echo "<td>" . $row['Qntty PCS'] . "</td>";
echo "<td>" . $row['Unit Price'] . "</td>";
echo "<td>" . $row['Total Price'] . "</td>";
echo "<td>" . $row['Shipment Date'] . "</td>";


echo "</tr>";
}
mysqli_close($con);


	?>
	
	</tbody>
</table>




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





   
   
   
<form	action="importFirst.php" method="post">
	<input type="submit" class="btn btn-success" value="Add More">
		      		  
</form>
</div>
<center>

</body>
<html>
 