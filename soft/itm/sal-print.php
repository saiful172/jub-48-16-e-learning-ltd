<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['print']) && !empty($_GET['print']))
	{
		$id = $_GET['print'];
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
   
    
	<table class="table table-hover table-responsive" id="table" style="width:100%;">
	
	<tr>    	 
        <td colspan="2"><center> <img src="user_images/<?php echo $userPic; ?>" class="img-rounded" width="150px" height="180px"  /></center></td>
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
        <td><?php echo $phone; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Email</label></td>
        <td><?php echo $email; ?></td>
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
	 	
	<tr>
        <td colspan="2">
		<button class="btn btn-success" onclick="toPrint();"><span class="glyphicon glyphicon-print"></span> Print </button>
		</td>
    </tr>
	 
    
</form>
	
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>

<script src="js/script.js"></script>