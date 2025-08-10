<?php require_once 'header.php'; ?>
<link rel="stylesheet" href="css/buttons.css">

<center><h4><ol class="breadcrumb"><li >Date Wise Dues Report</li> </ol> </h4></center>

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

		<div class="col-md-12">
		<a class="btn btn-success"  style="width:100%" href="ReportDues"> <span class="glyphicon glyphicon-file"></span> Date Wise Report  </a>
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-success"  style="width:100%" href="dues-report-details-single"> <span class="glyphicon glyphicon-file"></span> Single Report</a> 
		</div>
 
</div>
</div>		

<div class="col-md-10">
<div class="row">
	<div class="container">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			<i class="glyphicon glyphicon-check"></i>	Dues Report
			</div>
			
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReportDues.php" method="post" 
id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label">End Date </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>   View Report</button>
				    </div>
				  </div>
				</form>

			</div>
			
		</div>
	</div>
</div> 




<script src="custom/js/report.js"></script>

<?php require_once '../includes/footer.php'; ?>