<?php require_once 'header.php'; ?>
<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM customer WHERE customer_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM customer WHERE customer_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:customer.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">In-Active Customer </li></ol></h4></center>

	
	<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :01 :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search..">
			  </div>
			  
		      <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :02 :</span>
				 <input id="myInput1" style="width:100%"; type="text"  class="form-control" placeholder="Search..">
			  </div>

	<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer_add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Customer </a> 
		</div>
				
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer.php"> <span class="glyphicon glyphicon-eye-open"></span> Active Customer </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer_inactive.php"> <span class="glyphicon glyphicon-eye-open"></span> In-Active Customer </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="customer_all.php"> <span class="glyphicon glyphicon-eye-open"></span> Total Customer  </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-success" style="width:100%" href="customer_inactive_view.php"> <span class="glyphicon glyphicon-file"></span> Report ( In-Active )   </a> 
		</div>

		<div class="col-md-2">
		<a class="btn btn-success"  style="width:100%" href="CustomerReportByDate.php"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		
		</div>
    
<table width="100%" class="table table-striped table-bordered table-hover" customer_id="dataTables-example">
                        <thead>
                            <tr>
							
							<th colspan="6">Customer Information</th>
							<th colspan="2">Action</th>
                            </tr>
                            <tr>
								
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th>
                                <th>Photo</th>
								
								<th>Edit</th>
								<th>Delete</th>
                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from customer  where member_id='".$_SESSION['id']."' and status=0 ORDER BY customer_id DESC  ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['member_id'];
									?>
										<tr>
											
											<td><?php echo $eqrow['customer_no']; ?></td>
										    <td><?php echo $eqrow['customer_id']; ?></td>
											<td><?php echo $eqrow['customer_name']; ?></td>
											
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['contact_info']; ?></td>
										 <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
			
				<td><a  class="btn btn-info" href="customer_edit.php?edit_id=<?php echo $eqrow['customer_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['customer_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>



</body>
</html>