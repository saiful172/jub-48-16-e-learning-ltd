<!DOCTYPE html>
<html lang="en">  

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Profit Report |  <span> <a href="prft-report-by-date">   <i class="bi bi-table"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
                 <thead>
                        <tr>
						<th colspan="1">SL</th>
						<th colspan="1">Entry</th>
						<th colspan="3">Product</th>
						<th colspan="2">Single Price</th>
						<th colspan="3">Total Price / Profit</th>
                        </tr>
                        <tr>
							<th>No</th>
							<th>Date</th>
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
 
								$eq=mysqli_query($con,"select order_item.product_id,product.product_name,order_item.order_quantity,order_item.rate,order_item.buy_rate,order_item.entry_date
								from order_item
                                Left join product on product.product_id= order_item.product_id
								WHERE order_item.entry_date='$date' order by order_item.order_item_id  DESC");
								
							 
							
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
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
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
						<td colspan="3"><b>Total</b></td>
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
            
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>