<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<?php include('header.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Customer Dues </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>
<div class="container" style="width:100%;">
<center> <h4><ol class="breadcrumb"> <li class="active">Product List | 
<?php
				
				    
				    $Depo = $_POST['Depo'];
				   $eq=mysqli_query($con,"select distinct stuff_name from product_depo
				   left JOIN stuff ON stuff.userid = product_depo.user_id 
				   where product_depo.user_id='$Depo' ");
				   while($eqrow=mysqli_fetch_array($eq)){
				?>
			     <?php echo $eqrow['stuff_name']; ?>
				  
				   <?php }?>
</li></ol></h4> </center> 

<table width="100%" class="table table-bordered" style="font-size:15px;">
						
							<?php
							$Depo = $_POST['Depo'];
								$eq=mysqli_query($con,"SELECT distinct count(id) as total FROM product_depo 
                                						
		                        WHERE  product_depo.user_id='$Depo' and status = 1 ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><center><b>Total Product : <?php echo $eqrow['total']; ?></b></center></td>
									
								</tr>
								<?php
								}
							?>
						
					</table>
 
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
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Recent Stock</th>
							<th>Rate</th>
						</thead>
						 <tbody id="tbody">
			<?php
			
			
    
	 $Depo = $_POST['Depo'];
			$eq=mysqli_query($con,"SELECT product_depo.id,product_depo.user_id, product_depo.product_id, product_depo.product_name,
 		    product_depo.quantity, product_depo.rate,product_depo.entry_date  FROM product_depo 
		
		    WHERE product_depo.user_id = '$Depo' ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo $eqrow['product_id']; ?></td>
									
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
								</tr>
								<?php
								}
								
							?>
						</tbody>
					</table>	
					
					
	<table width="100%" class="table table-bordered" style="font-size:15px;">
						
							<?php
							$Depo = $_POST['Depo'];
								$eq=mysqli_query($con,"SELECT distinct count(id) as total FROM product_depo 
                                						
		                        WHERE  product_depo.user_id='$Depo' and status = 1 ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><center><b>Total Product : <?php echo ucwords($eqrow['total']); ?></b></center></td>
									
								</tr>
								<?php
								}
							?>
						
					</table>				
					




<!-- Latest compiled and minified JavaScript -->



</body>
</html>