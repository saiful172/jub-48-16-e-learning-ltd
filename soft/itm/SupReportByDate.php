<?php require_once 'header.php'; ?>
<link rel="stylesheet" href="css/buttons.css">

<center><h4> <ol class="breadcrumb"><li>Date Wise Supplier Report  </li> </ol> </h4></center>

<div class="col-md-2">
	<div class="buttons"> 
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="supplier-add"> <span class="glyphicon glyphicon-plus"></span> Add New  </a> 
		</div>
		
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success" style="width:100%" href="supplier-active-view"> <span class="glyphicon glyphicon-file"></span> All Supplier Report </a> 
		</div> 
		<div class="col-md-12">
		<a class="btn btn-success"  style="width:100%" href="SupReportByDate"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div> 
		</div>
		</div>
		
		
		<div class="col-md-10">
		
<div class="container">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			<i class="glyphicon glyphicon-check"></i>	Supplier Report 
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/SupReportByDate.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-eye-open"></i> View Report</button>
				    </div>
				  </div>
				</form>

			</div>
			 
		</div>
	</div> 
</div> 


</div> 


<script src="custom/js/report.js"></script>

<?php include('../includes/footer.php');?>