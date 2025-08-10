<?php require_once 'header.php'; ?>
<?php
 
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM employees WHERE  id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM employees WHERE  id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:customer.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Employees </li></ol></h4></center>

	
	
	<div class="col-md-2">

	<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="employee-add"> <span class="glyphicon glyphicon-plus"></span> Add new employee</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="employee-salary"> <span class="glyphicon glyphicon-list"></span> Salary List </a>
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="adv-salary"> <span class="glyphicon glyphicon-th-list"></span> Advance Salary List </a>
		</div>
			 
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success btn-w100" href="emp-all-report"> <span class="glyphicon glyphicon-file"></span> All Report</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100"  href="EmployeeReportByDate"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		
		</div>
		</div>
		
		<div class="col-md-10">
		
		 <div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
         </div>
			  
			<table width="100%" class="table table-responsive table-bordered table-hover" member_id="dataTables-example">
                        <thead>
                            <tr>
							 
							<th colspan="9">Employee's Information</th>
							<th colspan="1">Joining </th>
							<th colspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Mobile</th>
								<th>E-mail</th>
								<th>National ID </th>
								<th> Salary</th>
								<th> Position</th>
                                <th>Photo</th>
								<th>Date</th>
								
								<th>Edit</th>
								<th>Delete</th>
                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from employees  where user_id='".$_SESSION['id']."' and  status=1 ORDER BY id DESC  ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
											 
											
										    <td><?php echo $eqrow['id']; ?></td>
											<td><?php echo $eqrow['emp_name']; ?></td>
											
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['phone']; ?></td>
											<td><?php echo $eqrow['email']; ?></td>
											<td><?php echo $eqrow['national_id']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="50px;" width="45px;" /></td>
											<td><?php echo $eqrow['join_date']; ?></td>
										 
			
				<td><a  class="btn btn-info" href="employee-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Do You Want To Edit......?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete...?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

<?php include('../includes/footer.php');?>
