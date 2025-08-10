
	<div class="panel panel-danger" style="padding:0px;">
	
		  <div class="cardHeader" style="background-color:white;color:black;font-size:20px;padding:0px;text-align:center;">
		  <p><a href="daily-cash-report">Daily Cash Report</a>  </p>  
		  </div>

		  <div class="cardContainer" > 
			  <b>
		     <div class="panel-heading" style="display:none;">
			 <span class="badge1 pull pull-left">Total Sale Qty  </span> 
<span class="badge1 pull pull-right">
<?php 
 date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
$sql = $con->query("SELECT sum(order_item.order_quantity) as total FROM order_item
left join orders on orders.order_id=order_item.order_id
WHERE order_item.entry_date='$date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><?php echo $TSQ ; ?>

<!-- Total Buy Price/Cost-->
   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `sup_orders`
 WHERE order_date='$date' and order_status=1 and user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TPD= $row['total'];
?><?php echo $TPD ; ?>

</span> </div> 

<div class="panel-heading">
<span class="badge1 pull pull-left">Total Sale Price </span> 
<span class="badge1 pull pull-right">
<?php 
$sql = $con->query("SELECT sum(`today_total`) as `total` FROM `orders`
WHERE order_date='$date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSP= $row['total'];
?><?php echo $TSP ; ?>
</span> </div><hr>

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left">Paid By Invoice </span> 
<span class="badge1 pull pull-right">
 <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders`
 WHERE order_date='$date' and order_status='1' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$PBI= $row['total'];
?><?php echo $PBI ; ?>
</span> </div> 

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left">Total Paid </span> 
<span class="badge1 pull pull-right">
<?php
$TP=$PBI+$PBD ;
 echo $TP ;
 ?> 
</span> </div> 

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left">Total Due </span> 
<span class="badge1 pull pull-right">
		   <?php 
$sql = $con->query("SELECT sum(`due`) as `total` FROM `orders`
 WHERE order_date='$date' and order_status='1' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TDue= $row['total'];
?><?php echo $TDue ; ?>
</span> </div> 

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left">Total Due Paid Without Sale</span> 
<span class="badge1 pull pull-right">
		   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders_details` WHERE order_date='$date' and order_type=4 and orders_details.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TDPWS= $row['total'];
?> <?php echo $TDPWS ; ?>
</span> </div> 

<div class="panel-heading">
<span class="badge1 pull pull-left">Grand Total Collection </span> 
<span class="badge1 pull pull-right">
 <?php
$GTC=$TP+$TDPWS ;
 echo $GTC ;
 ?> 
</span> </div><hr>

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left">Office Expense</span> 
<span class="badge1 pull pull-right">
<?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OfExp=$row['total2'];
?> <?php echo $OfExp; ?>
</span> </div> 

<div class="panel-heading" style="display:none;">
<span class="badge1 pull pull-left"> Other Expense </span> 
<span class="badge1 pull pull-right">
<?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total1` FROM `expense_other` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OthExp=$row['total1'];
?> <?php echo $OthExp; ?>
</span> </div> 

<div class="panel-heading">
<span class="badge1 pull pull-left">Total Expense </span> 
<span class="badge1 pull pull-right">
 <?php 
$TotalExp= $TPD+$OfExp+$OthExp;
echo $TotalExp ;
?>
</span> </div><hr>

<div class="panel-heading">
<span class="badge1 pull pull-left">Total Cash </span> 
<span class="badge1 pull pull-right">
 <?php 
$Cash= $GTC-$TotalExp;
echo $Cash ;
?>
</span> </div><hr>
 
 
</b>

 
		  </div>
		</div>  
	