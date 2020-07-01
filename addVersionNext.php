
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
	
	
	
	
	
</head>
<body style="background-color:#C5FBFF;">

<div style="float:left">   
   
   
   <center>
   
   <h1 >Purchase Contract</h1>
   
	<br><br><br>
  
   <div style="padding:.2%;margin:0 auto;width:50%">
   <p style="font-weight:bold;float:left;font-size:20px">Details</p>
   <form	action="addVersionAmmend.php" method="post"style="float:right">

	<input type="submit" class="btn btn-success" value="Done">
</form>
   <table style="background:#FAFAFA ;">
   
   <tr>
   <td>Purchase Contact No.: </td>
	<td><?php echo $_SESSION["ScNoEdit"];?></td>
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









<div  class="table-responsive" >
	<table style="margin-top:5%;width:90%;background:#FAFAFA">
	<form	action="addVersionAddClm.php" method="post">

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
$ScNo=$_SESSION["ScNoEdit"];


// $sql = " SELECT * FROM `order` WHERE `Sales Contact No`='$ScNo'" or die(mysql_error());

         // $row = mysql_fetch_array($sql) or die(mysql_error());

 // $sqldata= mysqli_query($link, $sql);
// while($row = mysqli_fetch_array($sqldata))
// {
// $max=$row['Version'];
// }
// echo $max[0];

$version=$_SESSION["editVersion"];

// $version=0;
	$sqlget="SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `Version`= '$version' AND `CompanyID`='$comID'";
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
<input type="text" name="PONo" required >
</td>
<td>
<input type="text" name="MANo" required>		
</td>
<td>
<input type="text" name="Type" required>
</td>
<td>
<input type="text" name="QPcs" required>
</td>
<td>
<input type="text" name="UPrice" required>
</td>
<td>

</td>
</tr>

	
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
