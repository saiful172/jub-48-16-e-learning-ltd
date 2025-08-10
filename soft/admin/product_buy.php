<?php require_once 'header.php'; ?>
<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product_buy WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Products Buy</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">  Products Buy - Supplier Main Page </li></ol></h4></center>

  <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search -01 :</span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search ....">
			  </div>
			  
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search -02 :</span>
				 <input id="myInput1" style="width:100%; type="text"  class="form-control" placeholder="Search ....">
			  </div>
			  
<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_buy_add.php"> <span class="glyphicon glyphicon-plus"></span> New  Products Buy </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_buy_due_paid.php"> <span class="glyphicon glyphicon-pencil"></span> Dues Paid </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_buy_details.php"> <span class="glyphicon glyphicon-eye-open"></span> Detials</a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-success" style="width:100%" href="supplier_dues_report_all.php"> <span class="glyphicon glyphicon-file"></span> All Report </a> 
		</div>

		<div class="col-md-2">
		<a class="btn btn-success"  style="width:100%" href="SupplierDuesReport.php"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-success"  style="width:100%" href="dues_report_details_single.php"> <span class="glyphicon glyphicon-file"></span> Single Report </a> 
		</div>
		
		</div>



<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                     <tr>
                                
                                <th colspan="2"> Date </th>
                                <th colspan="3"> Supplier  Information </th>
                                <th colspan="8"> Ammount </th>
                                <th colspan="1">Paid </th>
								<th colspan="2">Action</th>
                            </tr>
							
						  <tr>
                                
                                <th>Invoice</th> 
                                <th>Last Paid  </th>
                                
                                <th>Id</th>
                                <th>Name</th>
								<th>Mobile</th>
								
								<th>Total</th>
								<th>Discount</th>
								<th>Transport</th>
								<th>Net Price</th>
								<th>Previous Dues</th>
								
								<th>Grand Total</th>
								<th>Paid</th>
								<th>Present  Dues</th>
								<th>Comment</th>
								
								<th>Cuses</th>
								
								<th>Edit</th>
								<th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from product_buy  ORDER BY id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			<td><?php echo date("d-m-Y", strtotime($eqrow['invoice_date'])); ?></td>
			<td><?php echo date("d-m-Y", strtotime($eqrow['last_update'])); ?></td>
			<td><?php echo $eqrow['supplier_id']; ?>  </td>
			<td><?php echo $eqrow['supplier_name']; ?>  </td>
			<td><?php echo $eqrow['phone']; ?>  </td>
			
			
			<td><?php echo $eqrow['today_total']; ?></td>
			<td><?php echo $eqrow['comision']; ?></td>
			<td><?php echo $eqrow['trans_cost']; ?></td>
			<td><?php echo $eqrow['net_price']; ?></td>
			<td><?php echo $eqrow['pre_due']; ?></td>
			
			<td><?php echo $eqrow['grand_total']; ?></td>
			<td><?php echo $eqrow['paid']; ?></td>
			<td><?php echo $eqrow['recent_due']; ?>  </td>
			<td><?php echo $eqrow['comments']; ?>  </td>
			<td><?php echo $eqrow['cuses']; ?>  </td>
			<td><a class="btn btn-info" href="product_buy_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('আপনি কি Edit করতে চাচ্ছেন ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
			<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('আপনি কি Delete করতে চাচ্ছেন ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a></td>
				
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