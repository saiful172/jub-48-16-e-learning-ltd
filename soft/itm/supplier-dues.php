<?php require_once 'header.php'; ?>
<?php
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM sup_orders_dues WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Supplier Dues - Main </li></ol></h4></center>
    
 
<div class="col-md-2">
<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="supplier-dues-paid"> <span class="glyphicon glyphicon-pencil"></span> Dues Pay</a> 
		</div>

		<div class="col-md-12">
		<a class="btn btn-info" style="width:100%" href="supplier-dues-details"> <span class="glyphicon glyphicon-eye-open"></span> Details View</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-danger" style="width:100%" href="supplier-dues-recent"> <span class="glyphicon glyphicon-eye-open"></span> Only Dues </a> 
		</div>
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success" style="width:100%" href="dues-report-all"> <span class="glyphicon glyphicon-file"></span> All Report </a> 
		</div>

		
</div>
</div>		


			
			<div class="col-md-10">
			<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
			</div>

			<table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
                        <thead>
                            
							<tr>
							<th colspan="1"> SL </th>
							<th colspan="1"> Last </th>
							<th colspan="1"> Invoice </th>
							<th colspan="2"> Supplier </th>
							<th colspan="5"> Amount </th>
							<th colspan="1"> Paid </th>
							</tr>
							<tr>
                                
                                 
                                <th>No </th>
                                <th>Collection Date</th>
                               
                                <th>No</th>
                                <th>Name</th>
								<th>Mobile</th>
								
								<th>Pre.Dues</th>
								<th> Today</th>
								<th>Total</th>
								<th>Paid</th>
								<th>Present Dues</th>
								
								<th>Subject</th>
								
                            </tr>
                        </thead>
						
						
                         <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from sup_orders_dues  
	Left JOIN supplier ON supplier.sup_id = sup_orders_dues.sup_id
	where sup_orders_dues.user_id='".$_SESSION['id']."'
	  ORDER BY sup_orders_dues.last_update DESC  ");
	  $sl=0;
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo date("M d,Y", strtotime($eqrow['last_update'])); ?></td>
			
			<td><?php echo $eqrow['order_id']; ?>  </td>
			
			<td><?php echo $eqrow['client_name']; ?>  </td>
			<td><?php echo $eqrow['client_contact']; ?>  </td>
			
			
			<td><?php echo $eqrow['pre_due']; ?></td>
			<td><?php echo $eqrow['today_total']; ?></td>
			<td><?php echo $eqrow['grand_total']; ?></td>
			<td><?php echo $eqrow['paid']; ?></td>
			<td><?php echo $eqrow['recent_due']; ?>  </td>
			
			<td><?php echo $eqrow['cuses']; ?>  </td>
		<!--	<td>
		 		<a class="btn btn-info" href="dues_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>  
			</td>
           -->			
          </tr>				
<?php
}
?>

</tbody>
</table>

<!-- Latest compiled and minified JavaScript -->

<?php include('../includes/footer.php');?>