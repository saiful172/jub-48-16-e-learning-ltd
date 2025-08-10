<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
<style>#btn{text-align:center;}</style>
<link rel="stylesheet" href="css/buttons.css"> 
</head>
<body>

<center><h4> <ol class="breadcrumb"><li > Project Income Report By Date</li> </ol> </h4></center>
<?php require_once 'more-fals/project-link-btn.php'; ?> 

<div class="container">
<div class="row"> 
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class=" 	glyphicon glyphicon-calendar"></i> Date Wise Income Report 
			</div>
			
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/project-income-report-by-date.php" method="post" id="getOrderReportForm">
				
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
				    <div id="btn" class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-file"></i> View Report</button>
				    </div>
				  </div>
				</form>

			</div>
			 
		</div>
	</div> 

</div> 

</div> 



<?php require_once '../includes/footer.php'; ?>


<script src="custom/js/report.js"></script>