
<?php
session_start();
include 'dbconfig.php';
$raw = $_SESSION["cid"] ;
$name = $_SESSION["cname"];
$uname =$_SESSION["uname"];
$state=$_GET["show_state"]?: 2;
$filter_state=$_GET["filter_state"]?:1;
include("header.html");
$comID=$_SESSION["companyID"];
$filter_buyer=$_SESSION["filter_buyer"];
echo "<center><p>fstate: ".$filter_state."showstate".$state."buyer".$filter_buyer."</p></center>";

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

<div style="display:inline-block">
<form style="display:inline-block" action="showOrder.php">
<input type="hidden" name="show_state" value="1">
<input type="submit" class="btn btn-success" value="Show Order With Ammendmen"></input>
</form>

<form action="showOrder.php" style="display:inline-block">
<input type="hidden" name="show_state" value="2">
<input type="submit" class="btn btn-success" value="Show Order"></input>
</form>

<form action="showOrder.php" style="display:inline-block">
<input type="hidden" name="show_state" value="3">
<input type="submit" class="btn btn-success" value="Show Order Detail"></input>
</form>
</div>


<?php if($state==1 OR $state==2):?>

<form action="filter.php" method="POST">
<input type="hidden" name="filter_state" value="2"></input>
<label for="text"> Filter By</label>
<select class="btn btn-success" name="filter_buyer">
<option>Buyer Name</option>
<?php

		  $sql="SELECT * FROM `orderfinal` WHERE `CompanyID`='$comID'";
		  $sqldata=mysqli_query($link,$sql);
		  while($row = mysqli_fetch_array($sqldata))
			{
				echo "<option>".$row["Buyer Name"]."</option>";
			}

?>
</select>

<button class="btn btn-success">Filter</button>
</form>

	<div class="table-responsive" style="width:95%">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="100%">Order Details</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td colspan="2">Sales Contact No 
	</td>	
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
	if($state==1)
	{
		if($filter_state==1){
	
	$sqlget="SELECT * FROM `order` WHERE `CompanyID`='$comID'";
		}
		else if($filter_state==2)
		{
			
		$sqlget="SELECT * FROM `order` WHERE `CompanyID`='$comID' AND `Buyer Name`='$filter_buyer'";
			
		}	
	}
	else{
		if($filter_state==1){
	$sqlget="SELECT * FROM `orderFinal`  WHERE `CompanyID`='$comID'";
		}	
	else if($filter_state==2)		
		{
			
		$sqlget="SELECT * FROM `orderfinal` WHERE `CompanyID`='$comID' AND `Buyer Name`='$filter_buyer'";
			
		}	
			
		
	}
	
	
		
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td> <a href='checkShowOrder.php?ScNoCheck=".$row['Sales Contact No']."'>" . $row['Sales Contact No']  ."</a></td>";
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
</div>

	<?php else:?>
	
	
	 <div style="margin:5%;width:50%;background:#C1EAEE;border-radius:10px;padding:2% ">
 <form action="checkShowOrder.php">
<label for="text"> Sales Contact No</label>
<input type="text"  name="ScNoCheck">
<button class="btn btn-success">Show</button>
</form>
</div>
 

<?php if($_SESSION["showFound"]==true):
?>


<?php 
$_SESSION["showFound"]=false;
$ScNo=$_SESSION["ScNoShow"];
$i=0;

while($i<=$_SESSION["Version"]){
	?>
	<div class="table-responsive" style="width:95%">
	<table style="margin-top:5%">
	<thead>
	<tr>
	<th colspan="100%"><?php echo "Sales Contact No: ".$ScNo;
	if($i>0)
echo " Am-". $i ;
else
	echo " ";

	
	$i?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
<td>Serial No</td>
	<td>PO No</td>
	<td>Model/Article No</td>
	<td>Type</td>
	<td>Qntty PCS</td>
	<td>Unit Price</td>
	<td>Total Price</td>
	
	</tr>











<?php
$ScNo=$_SESSION["ScNoShow"];
	$sqlget="SELECT * FROM `orderDetail` WHERE `Sc No`='$ScNo' AND `Version`='$i' AND `CompanyID`='$comID'";
$qpcsTotal=0;
$priceTotal=0;		
$sqldata= mysqli_query($link, $sqlget);
while($row = mysqli_fetch_array($sqldata))
{
echo "<tr>";
echo "<td>" . $row['Sl No'] . "</td>";
echo "<td>" . $row['PO No.'] . "</td>";
echo "<td>" . $row['Model/Article No'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";

	

echo "<td>" . $row['Qty In Pcs'] . "</td>";
echo "<td>" . $row['Unit Price'] . "</td>";
echo "<td>" . $row['Factory Value'] . "</td>";
$qpcsTotal=$qpcsTotal+$row['Qty In Pcs'];
$priceTotal=$priceTotal+$row['Factory Value'];
echo "</tr>";
}
mysqli_close($con);

echo "<tr style='background-color:green'>
<td colspan='4' style='font-weight:bold;color:white'><center>Total</center></td>
<td colspan='1' style='font-weight:bold;color:white'><center>".$qpcsTotal."</center></td>
<td colspan='1' style='font-weight:bold;background-color:white'><center></center></td>

<td colspan='1' style='font-weight:bold;color:white'><center>$".$priceTotal."</center></td>

</tr>
";
$i++;}

	?>
</div>	
	<?php endif?>





	
	<?php endif?>
</center>
</div>
</body>
<html>



