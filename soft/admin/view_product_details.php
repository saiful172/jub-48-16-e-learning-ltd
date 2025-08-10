<?php include('session.php'); ?>
<?php include('../scripts.php'); ?>
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
						<a href="../product.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
					</div>					
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
						
							
							
							<th>আইডি</th>
							<th>ছবি</th>
							<th>নাম</th>
							<th>ব্র্যান্ড </th>
							<th>ক্যাটাগরি</th>
							<th>পূর্বের স্টক</th>
							<th>পন্য এ্যাড</th>
							<th>বর্তমান  স্টক</th>
							<th>মূল্য </th>
							<th>এন্টির তারিখ</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"SELECT product.id, product_details.product_id, product_details.product_name,  product_details.brand_id,
 		product_details.categories_id, product_details.quantity,product_details.add_qty,product_details.total_qty, product_details.rate,product_details.entry_date, 
 		brands.brand_name, categories.categories_name, product.product_image FROM product_details 
		
		left outer JOIN product ON product_details.product_id = product.product_id 
		INNER JOIN brands ON product_details.brand_id = brands.brand_id 
		INNER JOIN categories ON product_details.categories_id = categories.categories_id  
		order by id desc");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo ucwords($eqrow['product_id']); ?></td>
									<td><img src="<?php echo ucwords($eqrow['product_image']); ?>" width="50px" alt="" /></td>
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['brand_name']; ?></td>
									<td><?php echo $eqrow['categories_name']; ?></td>
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['total_qty']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
									<td><?php echo $eqrow['entry_date']; ?></td>
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