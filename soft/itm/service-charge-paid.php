<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['delete_id']))
	{
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM service_charge_paid WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute(); 
		//header("Location:customer.php");
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Service Charge Paid </li></ol></h4></center>
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="service-charge-paid-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="service-charge-report-date"> <span class="glyphicon glyphicon-file"></span> Report</a> 
</div>
	

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-warning btn-w100" href="service-charge"> <span class="glyphicon glyphicon-list"></span> Client List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="service-cat"> <span class="glyphicon glyphicon-list"></span> Service Category</a>
</div>
       
	</div>
	</div>

	
<div class="col-md-10"> 
<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div>

<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                        <thead>
                            
                            <tr>
							    
                                <th>SL</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Year</th>
                                <th>Month</th>
								<th>Product Type</th>
								<th>Service Charge</th>
								<th>paid</th>
								<th>Dues</th>
								<th>Comments</th> 
								<th>Delete</th>
                            </tr>
                        </thead>
                      <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from service_charge_paid 
								left join customer on customer.customer_id=service_charge_paid.client_id 
								left join service_category on service_category.scat_id=service_charge_paid.product_type
								where service_charge_paid.user_id='".$_SESSION['id']."' and service_charge_paid.status=1 ORDER BY id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['user_id'];
									?>
										<tr>
										 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['client_id']; ?></td>
											<td><?php echo $eqrow['customer_name']; ?></td>  
											 
											<td><?php echo $eqrow['year']; ?></td>
										    <td><?php echo $eqrow['month']; ?></td>
											<td><?php echo $eqrow['name']; ?></td>
											<td><?php echo $eqrow['service_charge']; ?></td>
											<td><?php echo $eqrow['paid']; ?></td>
											<td><?php echo $eqrow['due']; ?></td>
											<td><?php echo $eqrow['comments']; ?></td>
										 
			
				<!--<td><a  class="btn btn-info" href="service_charge_paid_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				-->
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
 

<?php include('../includes/footer.php');?>
</div>