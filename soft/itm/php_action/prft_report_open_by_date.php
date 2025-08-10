<?php  session_start();
require_once '../../includes/conn.php';
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
<center>
<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <span style="font-size:21;font-weight:bold;">
			  <?php echo $pqrow['business_name']; ?><br>
				 </span> 
				   <?php }?>
  <span style="font-size:20;">        
Product Buy-Sale-Profit Report <br>
</span> 		
<span style="font-size:19;">
				   
			   		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?>  <br>
   Date :<?php echo date("M d,Y") ;?> |
   Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>  </center> <br>

<table border="1" class="table table-bordered" style="width:100%;">
                        <thead>
                        <tr>
						<th colspan="1">SL</th>
						<th colspan="1">Sales</th>
						<th colspan="1">Invoice</th>
						<th colspan="3">Product Information</th>
						<th colspan="2">Price </th>
						<th colspan="3">Total Price / Profit</th>
                        </tr>
                        <tr>
						<th>No</th> 
							<th>Date</th>
							
							<th>No</th> 
							<th>Name</th>
							<th>Quantty</th>
							
							<th>Buy </th>
							<th>Sales</th>
							
							<th>Buy </th>
							<th>Sales</th>
							<th>Profit</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							
					if($_POST) {		
							$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
 
								$eq=mysqli_query($con,"select order_item.product_id,product.product_name,order_item.order_id,order_item.order_quantity,order_item.rate,order_item.buy_rate,order_item.entry_date
								from order_item
                                Left join product on product.product_id= order_item.product_id
								WHERE order_item.entry_date >= '$start_date' AND order_item.entry_date <= '$end_date' order by order_item.order_item_id  DESC");
								
								
							$GrandTotalBuyRate= "";	
							$GrandTotalSaleRate= "";	
							$GrandTotalProfit= "";	
							
								while($eqrow=mysqli_fetch_array($eq)){
									$TotalBuyRate=$eqrow['order_quantity']*$eqrow['buy_rate'];
									$TotalSaleRate=$eqrow['order_quantity']*$eqrow['rate'];
									$Profit=$TotalSaleRate-$TotalBuyRate;
									
									$GrandTotalBuyRate+=$TotalBuyRate;
									$GrandTotalSaleRate+=$TotalSaleRate;
									$GrandTotalProfit+=$Profit;
									
									?>
										<tr>
										    <td><?php echo ++$sl; ?></td>
											<td><?php echo date("M-d-Y", strtotime($eqrow['entry_date'])); ?></td>
											<td><?php echo $eqrow['order_id']; ?></td> 
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['order_quantity']; ?></td>
											
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['rate']; ?></td>
											
											<td><?php echo $TotalBuyRate; ?></td>
											<td><?php echo $TotalSaleRate; ?></td>
											<td><?php echo $Profit; ?></td>
											
											
			</tr>
		<?php
					}  }
		?>
		
	
		<tr>
						<td colspan="3"><b>Total</b></td>
						<td><?php //Total Product
						$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
$sql = $con->query("SELECT count(`order_item_id`) as `total4` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total4'];
?><b><?php echo $TSQ ; ?></b></td>


						<td><?php //Total Product Qty
$sql = $con->query("SELECT sum(`order_quantity`) as `total3` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total3'];
?><b><?php echo $TSQ ; ?></b></td>

<td></td>
<td></td>

<td><b><?php echo $GrandTotalBuyRate; ?></b></td>
<td><b><?php echo $GrandTotalSaleRate; ?></b></td>
<td><b><?php echo $GrandTotalProfit; ?></b></td>


			            
</tr>
						
<tr>
<td colspan="12"> 
<?php //Total Product

$sql = $con->query("SELECT count(`order_item_id`) as `total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b>Total Product :  <?php echo $TSQ ; ?></b>
</td>
</tr>

<tr>

<td colspan="12">
<?php //Total Product Qty
$sql = $con->query("SELECT sum(`order_quantity`) as `total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b>Total Product  Quantty : <?php echo $TSQ ; ?></b>
</td>


</tr>

<tr>
<td colspan="12">
<b>Total Buy Price : <?php echo $GrandTotalBuyRate; ?></b>
</td>
</tr>

<tr>
<td colspan="12">
<b>Total Sales Price : <?php echo $GrandTotalSaleRate; ?></b>
</td>
</tr>

<tr>
<td colspan="12">
<b> 
<?php //Single Order Item discount
$sql = $con->query("SELECT sum(`single_discount`) as `Total` FROM `order_item`
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$SingDis= $row['Total'];
?>
Single Discount : <?php echo $SingDis ; ?> | 

<?php //Total Order discount
$sql = $con->query("SELECT sum(`discount`) as `total` FROM `orders`
WHERE order_date >= '$start_date' AND order_date <= '$end_date'  ");
$row = $sql->fetch_assoc();
$Dis= $row['total'];
?>
Total  Discount : <?php echo $Dis ; ?>   

</b>
</td>
</tr>

<tr>
<td colspan="12">
<b>Grand Total Profit : <?php echo $GrandTotalProfit-($SingDis+$Dis); ?></b>
</td>
</tr>

<tr>
<td colspan="12">
<b>
Total Collection = (Previous Due + Sales Price ) - Discount <br>
Total Collection = 
<?php //PreDue
$sql = $con->query("SELECT sum(`pre_due`) as `total` FROM `orders`
WHERE order_date >= '$start_date' AND order_date <= '$end_date'  ");
$row = $sql->fetch_assoc();
$PreDue= $row['total'];
?> (( <?php echo $PreDue ; ?> + <?php echo $GrandTotalSaleRate; ?> ) - 

<?php 
  $GTDis= $Dis+$SingDis;
?><?php echo $GTDis ; ?> ) = 


<?php //Paid Money
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders`
WHERE order_date >= '$start_date' AND order_date <= '$end_date'  ");
$row = $sql->fetch_assoc();
$Paid= $row['total'];
?> <?php echo $Paid ; ?>

</b>
</td>
</tr>
	
</tbody>
</table>

</body>


