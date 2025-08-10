<?php require_once 'header.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Customer Dues </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>
</head>

<body>

<center><h3><ol class="breadcrumb"> <li class="active"> Product Transfer </li></ol></h3></center>
    <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search-01:</span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>
			  
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search-02:</span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>
 
<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_transfer_add.php"> <span class="glyphicon glyphicon-plus"></span> New Transfer </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-success"  style="width:100%" href="product_transfer_report.php"> <span class="glyphicon glyphicon-file"></span> Report </a> 
		</div>
		
</div>



<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
							
							<th>Date</th>
							<th>To</th>
							<th>Product Name</th>
							<th>Quantity </th>
							<th>Rate</th>
							
                            <tr>
							
                        </thead>
                         <tbody id="tbody">

	
	
	<?php
			$eq=mysqli_query($con,"SELECT product_transfer.user_id,product_transfer.user_id, product_transfer.product_id, product_transfer.product_name,
 		product_transfer.quantity, product_transfer.rate, product_transfer.add_qty,product_transfer.entry_date, 
 		stuff.stuff_name  FROM product_transfer 
		
		left JOIN stuff ON stuff.userid = product_transfer.user_id 
		
		WHERE product_transfer.admin_id ='".$_SESSION['id']."' order by product_transfer.id desc Limit 100");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
								
									<td><?php echo date("d-M-Y", strtotime($eqrow['entry_date'])); ?></td>
									<td><?php echo  $eqrow['stuff_name']; ?></td>
									
									<td><?php echo $eqrow['product_name']; ?></td>
									
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['rate']; ?></td>
								</tr>
								<?php
								}
							?>
						</tbody>
</table>



<?php require_once 'includes/footer.php'; ?>
</div>	





</div>


<!-- Latest compiled and minified JavaScript -->



</body>
</html>