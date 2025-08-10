
<?php require_once 'session.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'conn2.php'; ?>
<?php require_once 'includes/db_connect.php' ?>
<?php require_once 'header_link.php' ?>

<!DOCTYPE html>
<html lang="en">
	<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
<style>
#btn{text-align:center;}
.panel-heading{border:1px solid gray; font-size:18px;}
</style>
</head>

<body>

 <br>
 <br>
<div class="container">

<div style="margin:auto auto;" class="row">

<div class="col-md-8">
<div class="panel-heading panel-active">
<center><h4><?php require_once 'name.php' ?><br> Daily Report Summary

 <br>
 Current Date :
<?php 
date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
echo date("d-m-Y") ;
?>
 |  Current Time :  <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </h4>
 
</center>
</div>
</div>
<!--Disbursement-->	
<div class="col-md-8">
<br>
<!--Disbursement-->	
<div class="panel-heading"><center> <b> Product Buy </b> </center></div>
<div class="panel-heading">Total Buy <span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`today_total`) as `total` FROM `product_buy` WHERE invoice_date='$date' ");
$row = $sql->fetch_assoc();
$PBIP= $row['total'];
?><?php echo $PBIP ; ?>
</span> </div>

<div class="panel-heading">Total Paid <span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`paid`) as `total` FROM `product_buy` WHERE invoice_date='$date' ");
$row = $sql->fetch_assoc();
$PBIP= $row['total'];
?><?php echo $PBIP ; ?>
</span> </div>

<div class="panel-heading">Total Due Paid Without Buy <span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`paid`) as `total` FROM `product_buy` WHERE last_update='$date' and paid_type=3 ");
$row = $sql->fetch_assoc();
$PBIP= $row['total'];
?><?php echo $PBIP ; ?>
</span> </div>

<br>

<div class="panel-heading"><center> <b> Sales </b> </center></div>

<div class="panel-heading">Total Sale Qty<span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`quantity`) as `total` FROM `order_item`
WHERE entry_date='$date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><?php echo $TSQ ; ?>
</span> </div>


<div class="panel-heading">Total Sale Price<span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`today_total`) as `total` FROM `orders`
WHERE order_date='$date' ");
$row = $sql->fetch_assoc();
$TSP= $row['total'];
?><?php echo $TSP ; ?>
</span> </div>

<div class="panel-heading">Total Buy Price <span class="badge1 pull pull-right">
<?php //Total Buy Price
$sql = $connect->query("SELECT sum(`total_buy_rate`) as `total` FROM `order_item`
WHERE entry_date='$date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TBP= $row['total'];
?><?php echo $TBP ; ?>
</span> </div>

<div class="panel-heading">Total Profit <span class="badge1 pull pull-right">
<?php 
$Profit= $TSP-$TBP;
echo $Profit ;
?>
</span> </div>

<div class="panel-heading"> Paid By Invoice<span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`paid`) as `total` FROM `orders`
 WHERE order_date='$date' and order_status='1' ");
$row = $sql->fetch_assoc();
$PBI= $row['total'];
?><?php echo $PBI ; ?>
</span> </div>

<div class="panel-heading"> Paid By Delivery<span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`deliver_date_paid`) as `total` FROM `orders`
 WHERE order_date='$date' and order_status='1' ");
$row = $sql->fetch_assoc();
$PBD= $row['total'];
?><?php echo $PBD ; ?>
</span> </div>



<div class="panel-heading">Total Paid<span class="badge1 pull pull-right">
<?php
$TP=$PBI+$PBD ;
 echo $TP ;
 ?> 
</span> </div>

<div class="panel-heading">Total Due<span class="badge1 pull pull-right">
<?php
$TD=$TSP-$TP ;
 echo $TD ;
 ?> 
</span> </div>

<div class="panel-heading">Total Due Paid Without Sale<span class="badge1 pull pull-right">
<?php 
$sql = $connect->query("SELECT sum(`paid`) as `total` FROM `orders_dues` WHERE last_update='$date' and dues_or_paid_status=5 ");
$row = $sql->fetch_assoc();
$TDPWS= $row['total'];
?> <?php echo $TDPWS ; ?>
</span> </div>

<div class="panel-heading">Grand Total Collection<span class="badge1 pull pull-right">
<?php
$GTC=$TP+$TDPWS ;
 echo $GTC ;
 ?> 
</span> </div>

<div class="panel-heading"><center> <b> Expense </b> </center></div>
<div class="panel-heading"> Expense <span class="badge1 pull pull-right">
<?php
$sql = $connect->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$Exp=$row['total2'];
?> <?php echo $Exp; ?>
</span></div>

<center><h1 class="h2"> <a target="_blank" class="btn btn-info" href="daily_report.php"> <span class="glyphicon glyphicon-print"></span> &nbsp; Print </a></h1></center>
		
</div>			
		</div>
		
		</div>
	
	
</div>
<br><br>

</body>	 
</html>	 