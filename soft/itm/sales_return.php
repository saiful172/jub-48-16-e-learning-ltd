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

<center><h4><ol class="breadcrumb"> <li class="active">Sales Return</li></ol></h4></center>
   
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search</span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search..">
			  </div>
 
<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="sales_return_add.php"> <span class="glyphicon glyphicon-plus"></span> New Return </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-success"  style="width:100%" href="sales_return_report.php"> <span class="glyphicon glyphicon-file"></span> Report </a> 
		</div>
		
</div>



<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
							
							<th>Date</th>
							<th>Invoice No</th>
							<th>Product Name</th>
							<th>Quantity </th>
							<th>Rate</th>
							
                            <tr>
							
                        </thead>
                         <tbody id="tbody">

	
	
	<?php
			$eq=mysqli_query($con,"SELECT sales_return.user_id,sales_return.user_id,sales_return.chalan_no, sales_return.product_id, sales_return.product_name, 
 		 sales_return.quantity, sales_return.rate, sales_return.add_qty,sales_return.entry_date 
 		  FROM sales_return 
		
		
		WHERE sales_return.user_id ='".$_SESSION['id']."' order by sales_return.id desc Limit 100 ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
								
									<td><?php echo date("d-M-Y", strtotime($eqrow['entry_date'])); ?></td>
									<td><?php echo  $eqrow['chalan_no']; ?></td>
									
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