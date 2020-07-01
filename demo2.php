
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
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
	
	
	
	
	
</head>
<body style="background-color:#C5FBFF;">

<div style="float:left">   
   
   
   <center>
   <h1>Purchase Contract</h1>
	<form	action="demo4.php" method="post"style="float:right;margin-right:2%">

	<input type="submit" class="btn btn-success" value="Done">
</form>
   </center>
   <div style="padding:2%;">
   <table style="background:#FAFAFA">
   
   <tr>
   <td>Purchase Contact No.: </td>
	<td><?php echo $_SESSION["ScNo"];?></td>
	</tr>
	
	<tr>
	<td>Buyer Name: </td>
	<td><?php echo $_SESSION["buyer"]?></td>
	</tr>
	
	<tr>
	<td>Issue Date:</td>
	<td><?php echo $_SESSION["idate"]?></td>
	</tr>
	
	<tr>
	<td>Receive Date:</td>
	<td><?php echo $_SESSION["rdate"]?></td>
	</tr>
	
	<tr>
	<td>Expire Date:</td>
	<td><?php echo $_SESSION["edate"]?></td>
	</tr>
	
	<tr>
	<td>Shipment Date:</td>
	<td><?php echo $_SESSION["sdate"]?></td>
	</tr>
	
	<tr>
	<td>Master LC:</td>
	<td><?php echo $_SESSION["mlc"]?></td>
	</tr>
	
	<tr>
	<td>LC Date:</td>
	<td><?php echo $_SESSION["lcdate"]?></td>
	</tr>
	
	<tr>
	<td>Remarks:</td>
	<td><?php echo $_SESSION["remarks"]?></td>
	</tr>
	  
	</table>
	</div>









<center>
<div  class="table-responsive" >
	<table style="margin-top:5%;width:90%;background:#FAFAFA">
	<form	action="demo3.php" method="post">

	<tbody>
	<thead>
	<tr>
	<td>
			<label for="text">PO No.</label>
		
	</td>	
	<td>
	<label for="text">Model/Article No.</label>
	</td>
	<td>
			<label for="text">Type</label>
		</td>
	<td>
	<label for="text">Qty In Pcs</label>	
	</td>
		<td>
			<label for="text">Unit Price</label>
		
	</td>
	<td>
		<label for="text">Factory Value</label>
		</td>
	
		</tr>
</thead>


<?php
$ScNo=$_SESSION["ScNo"];
$comID=$_SESSION['companyID'];
$version=0;
	$sqlget="SELECT * FROM `orderdetail` WHERE `Sc No`='$ScNo' AND `CompanyID`='$comID' ";
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['PO No.'] . "</td>";
echo "<td>" . $row['Model/Article No'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";
echo "<td>" . $row['Qty In Pcs'] . "</td>";
echo "<td>" . $row['Unit Price'] . "</td>";
echo "<td>" . $row['Factory Value'] . "</td>";

echo "</tr>";
}
mysqli_close($con);


	?>















<tr>
<td>
<input type="text" name="PONo" >
</td>
<td>
<input type="text" name="MANo">		
</td>
<td>
<input type="text" name="Type">
</td>
<td>
<input type="text" name="QPcs">
</td>
<td>
<input type="text" name="UPrice" >
</td>
<td>

</td>
</tr>
</center>
	
	<center>
	<td colspan="6" ><input type="submit" class="btn btn-success" value="Add">
	</center>
	</td>
	
	</tbody>
</table>
</form>





</div>




	








</center>
</div>
</body>
<html>
