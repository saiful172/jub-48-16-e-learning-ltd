<?php require_once 'header.php'; ?>
 <link rel="stylesheet" href="css/buttons.css">
<center><h4><ol class="breadcrumb"> <li class="active"> Employee Salary Report - Monthly</li></ol></h4></center>

<div class="col-md-2">
<div class="buttons">
        
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100"  href="employee-salary-create"> <span class="glyphicon glyphicon-pencil"></span> Create Salary </a> 
		</div>
		
        <div class="col-md-12">
		<a class="btn btn-primary btn-w100"  href="employee-salary-paid"> <span class="glyphicon glyphicon-pencil"></span> Pay Salary </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="employee-salary"> <span class="glyphicon glyphicon-list"></span> Salary List </a>
		</div>
	
			
		<div class="col-md-12">
		<a class="btn btn-warning btn-w100"  href="employee-salary-details"> <span class="glyphicon glyphicon-th-list"></span> Salary Histories</a> 
		</div>
	
		<div class="col-md-12">
		<a class="btn btn-success btn-w100"   href="EmpSalSingleReport.php"> <span class="glyphicon glyphicon-file"></span> Single Report</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100"   href="emp_sal_rpt_monthly.php"> <span class="glyphicon glyphicon-file"></span> Monthly Report</a> 
		</div> 
		
		</div>
		</div>
		
<div class="col-md-10">
<div class="container">

<div class="col-md-7"> 
<div class="row"> 
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class=" 	glyphicon glyphicon-file"></i> Monthly Employee Salary Report
			</div> 
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/emp_sal_rpt_monthly.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="Voucher" class="col-sm-3 control-label">Year</label>
				    <div class="col-sm-9">
				      <select class="form-control" style="width:100%;"  name="Year"  />
		<option value="#">Select Year</option> 
		<?php 
				      	$sql = "SELECT distinct year FROM employees_salary  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
		</select>
				    </div>
				  </div>
				  
				   <div class="form-group">
				    <label for="Voucher" class="col-sm-3 control-label">Month</label>
				    <div class="col-sm-9">
				      <select class="form-control" style="width:100%;"  name="Month" >
		<option value="#">Select Month</option> 
		<?php 
				      	$sql = "SELECT distinct month FROM employees_salary  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
		</select>
				    </div>
				  </div>
				  

				 
				  <div class="form-group">
				    <div id="btn" class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-file"></i> Open Report </button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	</div>
</div>
</div>

<div class="col-md-12">
	<?php require_once '../includes/footer.php'; ?>
</div>

</div> 

<script src="custom/js/report.js"></script>
