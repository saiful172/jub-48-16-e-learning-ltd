<?php require_once 'header.php'; ?> 
<?php 
	
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/table_data_center.css">


<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>


<center><h4><ol class="breadcrumb"> <li class="active">Product Buy-Sale/ Profit</li></ol></h4></center>	
	  <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search</span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search  .....">
			  </div>
			  
		  <!-- <search box 2 hidden>   <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search -02 :</span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search  .....">
			  </div>  -->
	
    	<h1 class="h2">
		<a class="btn btn-success" href="prft_report_by_date.php"> <span class="glyphicon glyphicon-print"></span> Date Wise Report</button> </a></span>
		<a class="btn btn-success" href="prft_report_by_date_short.php"> <span class="glyphicon glyphicon-print"></span>  Date Wise Report ( Sort ) </button> </a></span>
		</h1> 
    

<table width="100%" class="table table-striped table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
						
						<th colspan="1">Entry</th>
						<th colspan="1">Invoice</th>
						<th colspan="3">Product</th>
						<th colspan="2">Single Price</th>
						<th colspan="3">Total Price / Profit</th>
                        </tr>
                        <tr>
							<th>Date</th>
							
							<th>No</th>
							
							<th>Code</th>
							<th>Name</th>
							<th>Qty</th>
							
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
 
								$eq=mysqli_query($con,"select * from product
                               Left join order_item on order_item.product_id= product.product_id
							   Left join orders on orders.order_id= order_item.order_id
								WHERE order_item.entry_date='$date' 
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
										<tr>
										   
											<td><?php echo date("M-d-Y", strtotime($eqrow['entry_date'])); ?></td>
											<td><?php echo $eqrow['order_id']; ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['quantity']; ?></td>
											
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
						<td colspan="3"><b>Total</b></td>
						<td><?php //Total Product
$sql = $con->query("SELECT count(`order_item_id`) as `total` FROM `order_item`
WHERE entry_date='$date' and order_item_status='1' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><b><?php echo $TSQ ; ?></b></td>

						<td><?php //Total Product Qty
$sql = $con->query("SELECT sum(`quantity`) as `total` FROM `order_item`
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




</body>


