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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Customer Dues - Details </li></ol></h4></center>
    
	 
 
<div class="col-md-2">
<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="supplier-dues-paid"> <span class="glyphicon glyphicon-pencil"></span> Dues Paid</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="supplier-dues"> <span class="glyphicon glyphicon-eye-open"></span> View Main Dues</a> 
		</div>
		 

		</div>
		</div>

			<div class="col-md-10">
			<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search -01:</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
			  </div>
			<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                        <thead>
                            
							<tr>
							<th colspan="1"> Last </th>
							<th colspan="1"> Invoice </th>
							<th colspan="3"> Customer </th>
							<th colspan="5"> Ammount</th>
							<th colspan="1"> Paid </th>
							</tr>
							<tr>
                                
                                 
                                <th>Date  </th>
								
								<th>No</th>
								
                                <th>Id</th>
                                <th>Name</th>
								<th>Phone</th>
								
								<th>Previous Dues</th>
								<th> Today</th>
								<th>Total</th>
								<th>Paid</th>
								<th>Recent Dues</th>
								<th>Subject</th>
								
                            </tr>
                        </thead>
						
						
                         <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from sup_orders_details 
    Left JOIN supplier ON supplier.sup_id = sup_orders_details.sup_id
	where sup_orders_details.user_id='".$_SESSION['id']."' ORDER BY sup_orders_details.id DESC Limit 50 ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			<td><?php echo date("M d,Y", strtotime($eqrow['order_date'])); ?></td>
			<td><?php echo $eqrow['order_id']; ?>  </td>
			
			<td><?php echo $eqrow['sup_id']; ?>  </td>
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



</div>
</div>

<!-- Latest compiled and minified JavaScript -->

<?php include('../includes/footer.php');?>
