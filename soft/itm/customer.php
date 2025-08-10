<?php require_once 'header.php'; ?>

<?php 
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM customer WHERE customer_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM customer WHERE customer_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:customer.php");
	}

?>
<!DOCTYPE html> 
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Client / Customer List </li></ol></h4></center>
 
	<div class="col-md-2">
	<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="customer-add"> <span class="glyphicon glyphicon-plus"></span> Add New  </a> 
		</div>
		<!--		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer.php"> <span class="glyphicon glyphicon-eye-open"></span> Active Customer </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer_inactive.php"> <span class="glyphicon glyphicon-eye-open"></span> In-Active Customer </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer_all.php"> <span class="glyphicon glyphicon-eye-open"></span> Total Customer </a> 
		</div>  -->
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success" style="width:100%" href="customer-active-view"> <span class="glyphicon glyphicon-file"></span> All Customer Report </a> 
		</div>

		<div class="col-md-12">
		<a class="btn btn-success"  style="width:100%" href="CustomerReportByDate"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		
		</div>
		</div>
				
				<div class="col-md-10">
				<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search </span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search..">
			  </div>
					<table width="100%" class="table  table-bordered table-hover table-responsive" customer_id="dataTables-example">
                        <thead>
                            
                            <tr>
								 
                                <th>SL</th>
                                <th>No</th> 
                                <th>Name</th>
                                <th>Position</th>
								<th>Address</th>
								<th>Phone</th>
                                <th>Photo</th>
								
								<th>Edit</th>
                            </tr>
                        </thead>
						
						
                       <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from customer  where status=1 and member_id='".$_SESSION['id']."' ORDER BY customer_id Asc ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['member_id'];
									?>
										<tr>
											 
											<td><?php echo ++$sl; ?></td>
										    <td><?php echo $eqrow['customer_no']; ?></td>
											<td><?php echo $eqrow['customer_name']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['contact_info']; ?></td>
											<td><?php echo $eqrow['email']; ?></td>
										<!--  <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td> -->
			
				<td><a  class="btn btn-info" href="customer-edit?edit_id=<?php echo $eqrow['customer_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>   ||
		  <a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['customer_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>  
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

<?php include('../includes/footer.php'); ?>

