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

<link rel="stylesheet" href="css/table_data_center.css">
<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>
<center> <h4><ol class="breadcrumb"> <li class="active"> Product Return History | 
<?php
				   $eq=mysqli_query($con,"select distinct stuff_name from product_details
				   left JOIN stuff ON stuff.userid = product_details.user_id 
				   where product_details.user_id ='".$_SESSION['id']."' "); 
				   while($eqrow=mysqli_fetch_array($eq)){
				?>
			     <?php echo $eqrow['stuff_name']; ?>
				  
				   <?php }?>
</li></ol></h4> </center> 


 
       <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search</span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>

<table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
						    <th>Date</th>
							<th>Product Name</th>
							<th>Quantity </th>
							<th>Rate</th>
							<th>Cuses</th>
							
						</thead>
						 <tbody id="tbody">
			<?php
			$eq=mysqli_query($con,"SELECT product_details.admin_id,product_details.user_id, product_details.product_id, product_details.product_name,  
 		product_details.quantity, product_details.rate, product_details.add_qty, product_details.cuses,product_details.entry_date
 		 FROM product_details 
		
		WHERE product_details.admin_id ='".$_SESSION['id']."' order by product_details.id desc ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
								    <td><?php echo date("d-M-Y", strtotime($eqrow['entry_date'])); ?></td>
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
									<td><?php echo $eqrow['cuses']; ?></td>
								</tr>
								<?php
								}
								
							?>
						</tbody>
					</table>	
					
					
			


<?php require_once '../includes/footer.php'; ?>