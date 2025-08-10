<?php include('header.php'); ?>
<?php include('scripts.php'); ?>

<link rel="stylesheet" href="../css/table_data_center.css">
<!-- Search Script-->
<script src="../js/search.js"></script>
<!-- Search Script-->
<body>
    <div class="container-fluid">
		
		<center><h4><ol class="breadcrumb"> <li class="active">Product Add / Send / History</li></ol></h4> </center> 
 
       <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search-01:</span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>
			  
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search-02:</span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>
						
					
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
						<tr>
						    <th colspan="4" >Product Information</th>
						    <th colspan="3" >Quantity</th>
						    <th colspan="1" >Product</th>
						    <th colspan="2" >Sender</th>
						    <th colspan="1" >Cuses</th>
						    <th colspan="1" >Entry</th>
						</tr>
						
						<tr>
						    <th>Code</th>
							<th>Name</th>
							<th>Brand </th>
							<th>Category </th>
							
							<th>Previous </th>
							<th>Add</th>
							<th>Recent</th>
							
							<th>Rate</th>
							<th>From</th>
							<th>To</th>
							<th>For</th>
							<th>Date</th>
						</tr>
							
						</thead>
						 <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"SELECT product.id,product_details.product_id, product_details.product_name,  product_details.brand_id,
 		product_details.categories_id, product_details.quantity,product_details.add_qty,product_details.total_qty, product_details.rate,product_details.cuses, product_details.entry_date,
 		brands.brand_name, categories.categories_name, product.product_image, user.username,stuff.stuff_name FROM product_details 
		
		left outer JOIN user ON user.userid = product_details.admin_id 
		left outer JOIN stuff ON stuff.userid = product_details.user_id 
		left outer JOIN product ON product_details.product_id = product.product_id 
		INNER JOIN brands ON product_details.brand_id = brands.brand_id 
		INNER JOIN categories ON product_details.categories_id = categories.categories_id  
		order by product_details.id desc limit 200");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo  $eqrow['product_id'] ; ?></td>
							<!--	<td><img src="<?php echo $eqrow['product_image']; ?>" width="50px" alt="" /></td> -->
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['brand_name']; ?></td>
									<td><?php echo $eqrow['categories_name']; ?></td>
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['total_qty']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
									<td><?php echo $eqrow['username']; ?></td>
									<td><?php echo $eqrow['stuff_name']; ?></td>
									<td><?php echo $eqrow['cuses']; ?></td>
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