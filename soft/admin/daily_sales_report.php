<?php require_once 'session.php'; ?>
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

<div class="row">

<div class="col-md-12">
<div class="panel-heading panel-active"><center><h4>ITM-EASY-BUSINESS-SOFTWARE<br>Daily Report Summary
 <br>
 <b><?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
				   </b>
 <br>
 Current Date :
 <?php 
 $date=date("Y/m/d");
 echo date("d-m-Y") ;
  
 ?>
 |  Current Time :  <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </h4>
<hr></center><br>
	
	<div class="panel-heading">
		
		Buy Price 
		<span class="badge1 pull pull-right">
<?php 	
$sql = $connect->query("SELECT sum(`today_total`) as `total` FROM `product_buy` WHERE invoice_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$BP= $row['total'];
?>
<?php echo $BP ; ?>
		</span> 
		
		</div>
		
		<div class="panel-heading">
		
		Buy Price - Paid
		<span class="badge1 pull pull-right">
<?php 	
$sql = $connect->query("SELECT sum(`paid`) as `total` FROM `product_buy` WHERE invoice_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$BPP= $row['total'];
?>
<?php echo $BPP ; ?>
		</span>
		</div>
		
 <div class="panel-heading">
		Buy Price - Due
		<span class="badge1 pull pull-right">
<?php 	
$sql = $connect->query("SELECT sum(`recent_due`) as `total` FROM `product_buy` WHERE invoice_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$RD= $row['total'];
?>
<?php echo $RD ; ?>
		</span>
		</div>

		
		
		
	<div class="panel-heading">
		Previous Due 
		<span class="badge1 pull pull-right">
<?php 	

$sql = $connect->query("SELECT SUM(`pre_due`) as `total` FROM `orders` WHERE order_date='$date' and order_status='1' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$PD = $row['total'];
?>
<?php echo $PD ; ?>
		</span>
		</div>
		
		<div class="panel-heading">
		Total Sale
		<span class="badge1 pull pull-right">
<?php 	

$sql = $connect->query("SELECT SUM(`today_total`) as `total` FROM `orders` WHERE order_date='$date' and order_status='1' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$GT = $row['total'];
?>
<?php echo $GT ; ?>
		</span>
		</div>
		
<div class="panel-heading">
		Sale Paid 
		<span class="badge1 pull pull-right">
<?php 	

$sql = $connect->query("SELECT SUM(`paid`) as `total` FROM `orders` WHERE order_date='$date' and order_status='1' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$SP = $row['total'];
?>
<?php echo $SP ; ?>
		</span>
		</div>		
		
		<div class="panel-heading">
		Sale Due
		<span class="badge1 pull pull-right">
<?php 
$Due=$GT-$SP;
echo $Due;
?>
		</span>
		</div>		
		
		<div class="panel-heading">
		Recent Due
		<span class="badge1 pull pull-right">
<?php 	

$sql = $connect->query("SELECT SUM(`due`) as `total` FROM `orders` WHERE order_date='$date' and order_status='1' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$RD = $row['total'];
?>
<?php echo $RD ; ?>
		</span>
		</div>		
		
		<div class="panel-heading">
		Pre.Due Paid
		<span class="badge1 pull pull-right">
 <?php          
 $sql = $connect->query("SELECT SUM(`paid_taka`) as `total1` FROM `dues` where last_update='$date' and user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$PDP =$row['total1'];

?>
<?php echo $PDP ; ?>
		</span>
		</div>
		
		<div class="panel-heading">
		Expense
		<span class="badge1 pull pull-right">
<?php 	

$sql = $connect->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$Exp=$row['total2'];
?>
<?php echo $Exp; ?>
		</span>
		</div>
		
		<div class="panel-heading">
		<b>Total Cash<b/>
		<span class="badge1 pull pull-right">
		<b>
<?php 
$TotalCash=($GTS+$PDP)-($PSD+$PBIP+$Exp);
echo $TotalCash;
?><b/>
		</span>
		</div>
		
		
		</div>
		</div>
	
	
</div>
<!-- /row

<script src="custom/js/report.js"></script> -->
<br><br>
<div class="alert alert-info">
    <center><strong>Powered By </strong> ITM-SOFTS | Call : 01751891037 | Email : itmsofts@gmail.com <br> Website: www.itmsofts.com </a></center>
</div>
	 
</body>	 
</html>	 