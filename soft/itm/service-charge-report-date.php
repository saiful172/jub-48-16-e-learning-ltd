<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/buttons.css">
<style>#btn{text-align:center;}</style>
</head>
<body>

<center><h4> <ol class="breadcrumb"><li > Date Wise Service Charge Report</li> </ol> </h4></center>
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

<div class="container">
<div class="row"> 
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class=" 	glyphicon glyphicon-calendar"></i> Date Wise Service Charge Report
			</div>
			
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/service-charge-report-date.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" /> 
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label">End Date</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div id="btn" class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-file"></i> View Report</button>
				    </div>
				  </div>
				</form>

			</div>
			 
		</div>
	</div> 

</div> 

</div> 



<script src="custom/js/report.js"></script>

<?php require_once '../includes/footer.php'; ?>