<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['view']) && !empty($_GET['view']))
	{
		$id = $_GET['view'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM employees_salary_details
        Left JOIN employees ON employees.id = employees_salary_details.emp_id
		WHERE  employees_salary_details.emp_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}

	
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<body>

<center><h4><ol class="breadcrumb"> <li class="active">Employee Update  </li></ol></h4></center>

<div class="col-md-2">

	<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="employee-add"> <span class="glyphicon glyphicon-plus"></span> Add new employee</a> 
		</div>
		
		<div class="col-md-12">
		 <p><a class="btn btn-info btn-w100" href="employee"> <span class="glyphicon glyphicon-user"></span> Employee List </a></p>
		</div>
		
		
	 
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success  btn-w100" href="emp_all_report.php"> <span class="glyphicon glyphicon-file"></span> All Report</a> 
		</div>
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success  btn-w100"  href="EmployeeReportByDate.php"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		
		</div>
		</div>

<div class="col-md-10">   	
<div class="col-md-7">   	
   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-hover table-responsive">
	
	<tr>
    	<td><label class="control-label">Photo  </label></td>
        <td><img src="user_images/<?php echo $userPic; ?>" class="img-rounded" width="150px" height="200px"  /></td>
    </tr>
 		
	<tr>
    	<td><label class="control-label">Employee  Name </label></td>
        <td><?php echo $emp_name; ?></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Address </label></td>       
        <td><?php echo $address; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No.</label></td>
        <td><input class="form-control" type="text" name="Phone" placeholder="Mobile No." value="<?php echo $phone; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Email</label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="Email" value="<?php echo $email; ?>" /></td>
    </tr>
	
	 
	
	<tr>
    	<td><label class="control-label">Salary</label></td>
        <td><?php echo $salary; ?></td>
    </tr>
    
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><?php echo $position; ?></td>
    </tr>
    
	
		<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><?php echo date("D-M-Y") ;?></td>
    </tr>
	 
    
    
    </table>
	
	 
    
</form>
	
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>