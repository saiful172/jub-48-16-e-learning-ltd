<?php require_once 'header.php'; ?> 
 
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="css/table_data_center.css">


<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>
 

<center><h4><ol class="breadcrumb"> <li class="active">Product Buy-Sale-Profit</li></ol></h4></center>	
	  	
    	<h1 class="h2">
		<a class="btn btn-success" href="prft-report-by-date"> <span class="glyphicon glyphicon-print"></span>  Date Wise Report</button> </a></span>
		<a class="btn btn-success" href="prft-report-by-date-short"> <span class="glyphicon glyphicon-print"></span>  Date Wise Report ( Short ) </button> </a></span>
		</h1> 
    
<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search Here.....">
		</div>
			 
<table width="100%" class="table table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
						<th colspan="1">Entry</th>
						<th colspan="4">Product</th>
						<th colspan="2">Single Price</th>
						<th colspan="3">Total Price / Profit</th>
                        </tr>
                        <tr>
							<th>Date</th>
							<th>Code</th>
							<th>Name</th>
							<th>Order.Qty</th>
							<th>Back.Qty</th>
							<th>Rec.Qty</th>
							
							<th>Buy </th>
							<th>Sale</th>
							
							<th>Buy</th>
							<th>Sale</th>
							<th>Profit</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							date_default_timezone_set("Asia/Dhaka");
                            $date=date("Y/m/d");
 
								$eq=mysqli_query($con,"select order_item.product_id,product.product_name,order_item.back_qty, order_item.order_quantity,order_item.rate,order_item.buy_rate,order_item.entry_date
								from order_item
                                Left join product on product.product_id= order_item.product_id
								WHERE order_item.back_qty!=0 and order_item.entry_date='$date' order by order_item.order_item_id  DESC");
								
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
										   
											<td><?php echo date("M-d-Y", strtotime($eqrow['entry_date'])); ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['order_quantity']+$eqrow['back_qty']; ?></td>
											<td><?php echo $eqrow['back_qty']; ?></td>
											<td><?php echo $eqrow['order_quantity']; ?></td>
											
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['rate']; ?></td>
											
											<td><?php echo $TotalBuyRate; ?></td>
											<td><?php echo $TotalSaleRate; ?></td>
											<td><?php echo $Profit; ?></td>
				
				
			</tr>
		<?php
		}  
		?>
		
	
		<tr>
						<td colspan="2"><b>Total</b></td>
						<td><?php //Total Product
$sql = $con->query("SELECT count(`order_item_id`) as `total` FROM `order_item`
WHERE entry_date='$date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

						<td><?php //Total Product Qty
$sql = $con->query("SELECT sum(`order_quantity`) as `total` FROM `order_item`
WHERE entry_date='$date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>


<td></td>
<td></td>

<td><b><?php echo $GrandTotalBuyRate; ?></b></td>
<td><b><?php echo $GrandTotalSaleRate; ?></b></td>
<td><b><?php echo $GrandTotalProfit; ?></b></td>
			            
						</tr>
		
</tbody>
</table>

<?php include('../includes/footer.php'); ?>

