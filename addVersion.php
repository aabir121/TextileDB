
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
<body >

<div style="float:left;width:80%">

   	<?php
	$ScNo=$_SESSION["ScNoEdit"];
	$sqlget="SELECT * FROM `order` WHERE `Sales Contact No` LIKE '$ScNo' AND `CompanyID`='$comID'";
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

$_SESSION['buyer']=$BName;
$_SESSION['idate']=$IDate;


	$sqlget="SELECT * FROM `orderfinal` WHERE `Sales Contact No` LIKE '$ScNo' AND `CompanyID`='$comID'";
$sqldata= mysqli_query($link, $sqlget);

while($row = mysqli_fetch_array($sqldata))
{
$BNameF= $row['Buyer Name'] ;
$IDateF=$row['Issue Date'] ;
$RDateF=$row['Recieve Date'];
$MLCF=$row['Master LC'];
$LCDateF=$row['LC Date'];
$RemarksF=$row['Remarks'];
$EDateF=$row['Expire Date'];
$ValidityF=$row['Validity'] ;
$QPcsF=$row['Qntty PCS'] ;
$UPriceF= $row['Unit Price'] ;
$TPriceF=$row['Total Price'];
$SDateF= $row['Shipment Date'];


}




mysqli_close($con);

?>












<table style="background:#FAFAFA ; width:50%;margin:0 auto;border:'0'">
	<thead>
	<tr>
	<th colspan="100%" rowspan="2">Previous Order Details</th>
	</tr>
	</thead>   <tr>
   <td>Purchase Contact No.: </td>
	<td><?php echo $ScNo;?></td>
	</tr>
	
	<tr>
	<td>Buyer Name: </td>
	<td><?php echo $BNameF?></td>
	</tr>
	
	<tr>
	<td>Issue Date:</td>
	<td><?php echo $IDateF?></td>
	</tr>
	
	<tr>
	<td>Receive Date:</td>
	<td><?php echo $RDateF?></td>
	</tr>
	
	<tr>
	<td>Expire Date:</td>
	<td><?php echo $EDateF?></td>
	</tr>
	
	<tr>
	<td>Shipment Date:</td>
	<td><?php echo $SDateF?></td>
	</tr>
	
	<tr>
	<td>Master LC:</td>
	<td><?php echo $MLcF?></td>
	</tr>
	
	<tr>
	<td>LC Date:</td>
	<td><?php echo $LCDateF?></td>
	</tr>
	
	<tr>
	<td>Remarks:</td>
	<td><?php echo $RemarksF?></td>
	</tr>
	  
	</table>





<br><br><br>
	<table style="margin-top:5%;width:70%;margin:0 auto">
	<form	action="addVersionCheck.php" method="post">

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
	<label for="text">Buyer Name: <p><?php echo $BName?></label>
	</td>
	<td>
			<label for="text">Issue Date: <p><?php echo $IDate?></label>
		</tr>
		
		<tr>
	<td>
	<label for="text">Receive Date</label>
		<input type="date" name="RDate" required>
	</td>
	<td>
			<label for="text">Expire Date</label>
		<input type="date" name="EDate" required>
	</td>
	<td>
		<label for="text">Shipment Date</label>
		<input type="date" name="SDate" required>
		</td>
		
	</tr>
	
	<tr>
		<td>
		<label for="text">Master LC</label>
		<input type="text" name="MLc">
		</td>
	<td>
	<label for="text">LC Date</label>
		<input type="date" name="LCDate">
	</td>
	</tr>
	<tr>
	
	<td colspan="3">
		<label for="text">Remarks</label>
		<input type="text" name="remarks">
	</td>
		

	
	</tr>
	
	
	
	
	
	<tr>
	<center>
	<td colspan="3"><input type="submit" class="btn btn-success" value="Add Ammenmend">
	</center>
	</td>
	
	</tbody>
</table>




















</div>
</body>
<html>
