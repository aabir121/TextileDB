<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
$ScNo=$_SESSION["ScNo"];
$_SESSION["firstTime"]=true;
include("header.html");
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
<body >

<div style="float:left;width:80%">

   <?php if($_SESSION["loggedin"]==true):?>
   
 <div style="margin:5%;width:50%;background:#C1EAEE;border-radius:10px;padding:2% ">
 <form action="checkEditOrder.php" method="post">
<label for="text"> Sales Contact No</label>
<input type="text"  name="ScNoCheck">
<button class="btn btn-success">Edit</button>
</form>

</div>
<center>

<div class="table-respinsive" style="width:95%">
	<table style="margin-top:0%">
	<thead>
	<tr>
	<th colspan="100%">Order Details</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td colspan="2" >Sales Contact No</td>	
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
	$comID=$_SESSION["companyID"];
	$sqlget = "SELECT * FROM `order` WHERE `CompanyID`='$comID'";
	// $sqlget="SELECT * FROM `order`";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Sales Contact No'] ."</td>";
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


<?php
if($_SESSION["editNotFound"]==true)
{
$_SESSION["editNotFound"]=false;
echo '<script type="text/javascript">'; 
echo 'alert("No such entries found.");'; 
echo 'window.location.href = "editOrder.php";';
echo '</script>';
}
?>

</div>	

<?php else:?>

<p> You have to log in to view this page</p>

<?php endif?>
</body>
<html>
 