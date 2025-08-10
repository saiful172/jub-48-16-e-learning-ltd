<?php require_once 'session.php'; ?>  
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
<center><h4>

 <?php 	    
				   $pq=mysqli_query($con,"select * from stuff where userid ='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
				<img src="../<?php if($pqrow['photo']==""){echo "../img/user.jpg";}else{echo $pqrow['photo'];} ?>"  width="100px;"><br>
<b><?php echo $pqrow['business_name']; ?> </b>

 <?php }?>
<br> Daily Report Summary

<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?> 
 <br>
 
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

<div class="panel-heading"><center> <b> Sales </b> </center></div>

<div class="panel-heading">Total Sale Qty<span class="badge1 pull pull-right">
<?php 
 $startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
$sql = $con->query("SELECT sum(order_item.quantity) as total FROM order_item
left join orders on orders.order_id=order_item.order_id
WHERE order_item.entry_date >= '$start_date' AND order_item.entry_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><?php echo $TSQ ; ?>
</span> </div>


<div class="panel-heading">Total Sale Price<span class="badge1 pull pull-right">
<?php 
$sql = $con->query("SELECT sum(`today_total`) as `total` FROM `orders`
WHERE   order_date >= '$start_date' AND order_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TSP= $row['total'];
?><?php echo $TSP ; ?>
</span> </div>


<div class="panel-heading"> Paid By Invoice<span class="badge1 pull pull-right">
<?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders`
 WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status='1' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$PBI= $row['total'];
?><?php echo $PBI ; ?>
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
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders_dues`
WHERE  last_update >= '$start_date' AND last_update <= '$end_date' and  dues_or_paid_status=5 and orders_dues.user_id ='".$_SESSION['id']."'  ");
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
  
<br>

<div class="panel-heading"><center> <b> Expense </b> </center></div> 

<div class="panel-heading"> Office Expense <span class="badge1 pull pull-right">
<?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` 
where entry_date >= '$start_date' AND entry_date <= '$end_date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OfExp=$row['total2'];
?> <?php echo $OfExp; ?>
</span></div>

<div class="panel-heading"> Other Expense <span class="badge1 pull pull-right">
<?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total1` FROM `expense_other` 
where entry_date >= '$start_date' AND entry_date <= '$end_date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OthExp=$row['total1'];
?> <?php echo $OthExp; ?>
</span></div>

<div class="panel-heading">Total Expense <span class="badge1 pull pull-right">
<?php 
$TotalExp= $OfExp+$OthExp;
echo $TotalExp ;
?>
</span> </div>


<br>

<div class="panel-heading"><center> <b> Cash </b> </center></div>

<div class="panel-heading">Total Cash <span class="badge1 pull pull-right">
<?php 
$Cash= $GTC-$TotalExp;
echo $Cash ;
?>
</span> </div>


</div>			
		</div>
		
		</div>
	
	
</div>
<br><br>