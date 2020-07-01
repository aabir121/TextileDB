
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
$version=$_POST['version'];
$_SESSION['Version']=$version;
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
<body >

<div style="float:left;width:80%">

   
  
   	<?php
	$ScNo=$_SESSION["ScNoEdit"];
	$sqlget="SELECT * FROM `order` WHERE `Sales Contact No` LIKE '$ScNo' AND `Version` LIKE '$version' AND `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sqlget);

while($row = mysqli_fetch_array($sqldata))
{
$BName= $row['Buyer Name'] ;
$IDate=$row['Issue Date'] ;
$RDate=$row['Recieve Date'];
$MLC=$row['Master LC'];
$LCDate=$row['LC Date'];
$Remarks=$row['Remarks'];
$EDate=$row['Expire Date'];
$Validity=$row['Validity'] ;
$QPcs=$row['Qntty PCS'] ;
$UPrice= $row['Unit Price'] ;
$TPrice=$row['Total Price'];
$SDate= $row['Shipment Date'];


}
mysqli_close($con);



?>
<center>
	<table style="margin-top:5%;width:90%">
	<form	action="editOrderUpdate.php" method="post">

	<thead>
	<tr>
	<th colspan="100%" rowspan="2">Place Order</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>
			<label for="text"style="display:inline">Sales Contact No: <p><?php echo $_SESSION["ScNoEdit"]?> </p></label>
		
	</td>	
	<td>
	<label for="text">Buyer Name</label>
		<input type="text" name="Buyer" value=<?php echo $BName?>>		
	</td>
	<td>
			<label for="text">Issue Date</label>
		<input type="date" name="IDate"value=<?php echo $IDate?>></td>
		</tr>
		
		<tr>
	<td>
	<label for="text">Receive Date</label>
		<input type="date" name="RDate" required value=<?php echo $RDate?> >
	</td>
	<td>
			<label for="text">Expire Date</label>
		<input type="date" name="EDate" required value=<?php echo $EDate?>>
	</td>
	<td>
		<label for="text">Qntty PCS</label>
		<input type="text" name="QPCS" required value=<?php echo $QPcs?>>
	</td></tr>
	
	<tr>
	<td>
	<label for="text">Total Price</label>
		<input type="text" name="TPrice" required value=<?php echo $TPrice?>>
	</td>
	<td>
		<label for="text">Shipment Date</label>
		<input type="date" name="SDate" required value=<?php echo $SDate?>>
		</td>
			<td>
		<label for="text">Master LC</label>
		<input type="text" name="MLc"value=<?php echo $MLC?>>
		</td>
	
	</tr>
	<tr>
	<td>
	<label for="text">LC Date</label>
		<input type="date" name="LCDate"value=<?php echo $LCDate?>>
	</td>
	<td colspan="2">
		<label for="text">Remarks</label>
		<input type="text" name="remarks"value=<?php echo $Remarks?>>
		</td>

	
	</tr>
	<tr>
	
	
	
	
	
	<tr>
	<center>
	<td colspan="3"><input type="submit" class="btn btn-success" value="Update">
	</center>
	</td>
	
	</tbody>
</table>




















</center>
</div>
</body>
<html>
