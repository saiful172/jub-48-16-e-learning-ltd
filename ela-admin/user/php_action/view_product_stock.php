<?php include('../session.php'); ?>
<?php include('scripts.php'); ?>
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
				<div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-10">
						<table>
							<tr>
								
								<td><span style="font-size:20px;">Product Details List</span></td>
							</tr>
						</table>
					</div>
					<div class="col-lg-2 pull-right noprint">
						<button class="btn btn-success " onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
						<a href="../index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
					</div>					
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Brand </th>
							<th>Category </th>
							<th>Recent Stock</th>
							<th>Rate</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"SELECT product.id, product.product_id, product.product_name, product.product_image, product.brand_id,
 		product.categories_id, product.quantity, product.rate, product.active, product.status,product.entry_date, 
 		brands.brand_name, categories.categories_name FROM product 
		
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1 order by id desc");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo ucwords($eqrow['product_id']); ?></td>
									
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['brand_name']; ?></td>
									<td><?php echo $eqrow['categories_name']; ?></td>
									
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>					
				</div>
				</div>
           
			</div>
	</div>
	<br>
	
	
</body>
</html>