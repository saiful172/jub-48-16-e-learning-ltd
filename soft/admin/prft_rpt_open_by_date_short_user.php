<?php 
session_start();
require_once '../includes/conn.php';
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">

</head>

<body>


<div class="container" style="width:100%;">
<center style="font-size:20px;"> <?php include('../includes/report_title.php'); ?> <br> Product Sales  Profit<br></center> 
  <center style="font-size:16px;">  

<?php
				   $UserId = $_POST['UserId'];
				   $pq=mysqli_query($con,"select distinct userid,stuff_name from stuff  where userid = '$UserId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <!--      Stuff  Id :  <?php echo $pqrow['userid']; ?> | -->	
		<b>	      User   Name :  <?php echo $pqrow['stuff_name']; ?> </b>
				  
				   <?php }?>
<br>
				   
			   		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date  to :  ' ; echo date("M d, Y", strtotime( $endDate));
?>  <br>
  Date :<?php echo date("M d,Y") ;?> |
  Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </center> 

<table border="1" class="table table-bordered" style="width:100%;">
                        						
                        <tbody id="tbody">
							<?php
							
					if($_POST) {		
							$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
	$UserId = $_POST['UserId'];
 
								$eq=mysqli_query($con,"select * from product
                               Left join order_item on order_item.product_id= product.product_id
                               Left join orders on orders.order_id= order_item.order_id
								WHERE order_item.entry_date >= '$start_date' AND order_item.entry_date <= '$end_date' and orders.user_id= '$UserId'
								order by order_item.order_item_id  DESC");
								
							$GrandTotalBuyRate= "";	
							$GrandTotalSaleRate= "";	
							$GrandTotalProfit= "";	
							
								while($eqrow=mysqli_fetch_array($eq)){
									$TotalBuyRate=$eqrow['quantity']*$eqrow['buy_rate'];
									$TotalSaleRate=$eqrow['quantity']*$eqrow['rate'];
									$Profit=$TotalSaleRate-$TotalBuyRate;
									
									$GrandTotalBuyRate+=$TotalBuyRate;
									$GrandTotalSaleRate+=$TotalSaleRate;
									$GrandTotalProfit+=$Profit;
									
									?>
		<!--							<tr>
										   
											<td><?php echo date("M-d-Y", strtotime($eqrow['entry_date'])); ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['quantity']; ?></td>
											
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['rate']; ?></td>
											
											<td><?php echo $TotalBuyRate; ?></td>
											<td><?php echo $eqrow['total']; ?></td>
											<td><?php echo $Profit; ?></td>
											
											
			</tr>   -->	
		<?php
					}  }
		?>
		

	
<tr>
<td colspan="9"> 
<?php //Total Product

$sql = $con->query("SELECT count(`order_item_id`) as `total` FROM `order_item`
Left join orders on orders.order_id= order_item.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and orders.user_id= '$UserId' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b>Total Product :  <?php echo $TSQ ; ?></b>
</td>
</tr>

<tr>
<td colspan="9">
<?php //Total Product Qty
$sql = $con->query("SELECT sum(`quantity`) as `total` FROM `order_item`
Left join orders on orders.order_id= order_item.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and orders.user_id= '$UserId' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b>Total Product  Quantty : <?php echo $TSQ ; ?></b>
</td>
</tr>

<tr>
<td colspan="9">
<b>Total Buy Price : <?php echo $GrandTotalBuyRate; ?></b>
</td>
</tr>

<tr>
<td colspan="9">
<b>Total Sales Price : <?php echo $GrandTotalSaleRate; ?></b>
</td>
</tr>

<tr>
<td colspan="9">
<b>Total Profit : <?php echo $GrandTotalProfit; ?></b>
</td>
</tr>
	
</tbody>
</table>

</body>


