<?php include('session.php'); ?>
<?php require_once 'header.php'; ?>

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

<center> <h4><ol class="breadcrumb"> <li class="active">Product List</li></ol></h4> </center> 
<table width="100%" class="table table-bordered" style="font-size:15px;">
						
							<?php
								$eq=mysqli_query($con,"SELECT distinct count(id) as total FROM product_depo  WHERE user_id ='".$_SESSION['id']."' ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><center><b>Total Product : <?php echo ucwords($eqrow['total']); ?></b></center></td>
									
								</tr>
								<?php
								}
							?>
						
					</table>
 
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search </span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>

<table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							
							<th>Product Name</th>
							<th>Recent Stock</th>
							<th>Price</th>
							<th>Retail Price</th>
						</thead>
						 <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"SELECT *  FROM product ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
									<td><?php echo $eqrow['retail_rate']; ?></td>
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>	
					
					
	<table width="100%" class="table table-bordered" style="font-size:15px;">
						
							<?php
								$eq=mysqli_query($con,"SELECT distinct count(id) as total FROM product_depo  WHERE user_id ='".$_SESSION['id']."' ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><center><b>Total Product : <?php echo ucwords($eqrow['total']); ?></b></center></td>
									
								</tr>
								<?php
								}
							?>
						
					</table>				
					


<?php require_once '../includes/footer.php'; ?>

<!-- Latest compiled and minified JavaScript -->



</body>
</html>