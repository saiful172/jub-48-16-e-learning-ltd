
<?php include('scripts.php'); ?>
<link rel="stylesheet" href="../css/table_data_center_with_border_black.css">
<!-- Search Script-->
<script src="../js/search.js"></script>
<!-- Search Script-->
<body>
    <div class="container-fluid"><br>
<!-- 		 <a href="../product.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> -->
	<center>	<h4><ol class="breadcrumb"> <li class="active">Product Add / Send History</li></ol></h4> </center> 
 
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search </span>
				 <input id="myInput1" style="width:100%;" type="text"  class="form-control" placeholder="Search..">
			  </div>
						
					
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
					
					    <tr>
						    <th colspan="2" >Product Information</th>
						    <th colspan="3" >Quantity</th>
						    <th colspan="1" >Product</th> 
						    <th colspan="1" >Cuses</th>
						    <th colspan="1" >Entry</th>
						</tr>
						
						<tr>
						    <th>Code</th>
							<th>Name</th>
							
							<th>Previous </th>
							<th>Add</th>
							<th>Recent</th>
							
							<th>Rate</th> 
							<th>For</th>
							<th>Date</th>
						</tr>
							
						 <tbody id="tbody">
							<?php
							require_once '../../includes/conn.php'; 
								$eq=mysqli_query($con,"SELECT product_details.id, product_details.product_id, product_details.product_name,
 		 product_details.quantity,product_details.add_qty,product_details.total_qty, product_details.rate,product_details.cuses,product_details.entry_date, 
 		product.product_image, user.full_name,stuff.stuff_name  FROM product_details 
		
		left outer JOIN user ON user.userid = product_details.admin_id 
		left outer JOIN stuff ON stuff.userid = product_details.user_id 
		left outer JOIN product ON product_details.product_id = product.product_id 
		order by id desc limit 300 ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo $eqrow['product_id']; ?></td>
							<!--	<td><img src="<?php echo $eqrow['product_image']; ?>" width="50px" alt="" /></td> -->
									<td><?php echo $eqrow['product_name']; ?></td>
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['total_qty']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td> 
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