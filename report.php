
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
include("header.html");
$comID=$_SESSION["companyID"];
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
	<style>
	table{
		background-color:#FAFAFA;

	}
	</style>
	
	
	
	
	
</head>
<body style="background-color:#C5FBFF;">

<div style="float:left;width:80%">


<center>
<div>
<h2><?php echo $_SESSION["companyName"];?></h2>
<h4><?php echo $_SESSION["companyAdrs"];?></h4>
<h4>
	<?php	echo "\n".$_SESSION["companyEmail"];		?></h4>
</div>

<div style="display:inline-block">
<form style="display:inline-block" action="showOrder.php">
<input type="hidden" name="show_state" value="1"></input>
<input type="submit" class="btn btn-success" value="Show Order With Ammendmend"></input>
</form>

<form action="showOrder.php" style="display:inline-block">
<input type="hidden" name="show_state" value="2"></input>
<input type="submit" class="btn btn-success" value="Show Order"></input>
</form>

<form action="showOrder.php" style="display:inline-block">
<input type="hidden" name="show_state" value="3"></input>
<input type="submit" class="btn btn-success" value="Show Order Detail"></input>
</form>
</div>
<form action="download.php" style="display:inline-block">
<input type="submit" class="btn btn-success" value="Download"></input>
</form>
</div>





	<div class="table-responsive" style="width:95%">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="100%">Order Details</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td colspan="2">Sales Contact No</td>	
	<td>Buyer Name</td>
	<td>Issue Date</td>
	<td>Receive Date</td>
	<td>Master LC</td>
	<td>LC Date</td>
	<td>Remarks</td>
	<td>Expire Date</td>
	<td>Validity</td>
	<td>Qntty PCS</td>
	<td>Unit Price</td>
	<td>Total Price</td>
	<td>Shipment Date</td>
	
	</tr>
	<?php
	$sqlget="SELECT * FROM `order`  WHERE `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Sales Contact No']  ."</td>";
if($row['Version']>0)
echo "<td>"."Am-". $row['Version'] . "</td>";
else
	echo "<td></td>";
echo "<td>" . $row['Buyer Name'] . "</td>";
echo "<td>" . $row['Issue Date'] . "</td>";
echo "<td>" . $row['Recieve Date'] . "</td>";
echo "<td>" . $row['Master LC'] . "</td>";
echo "<td>" . $row['LC Date'] . "</td>";
echo "<td>" . $row['Remarks'] . "</td>";
echo "<td>" . $row['Expire Date'] . "</td>";

if($row['Validity']<0)
echo "<td style='background:#FA5858'><bold> ". $row['Validity'] . "</bold></td>";
else
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

</center>
</div>
</body>
<html>
