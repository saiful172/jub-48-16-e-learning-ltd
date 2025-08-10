<?php require_once 'includes/db_connect.php' ?>
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<style>#btn{text-align:center;}</style>
</head>
<body>

<center><h4> <img src="img/banner1.png" width="100%"><ol class="breadcrumb"><li >Expense Report</li> </ol> </h4></center>
<div class="row">
<!-- Date Wise Disbursement Report Start-->
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class=" 	glyphicon glyphicon-calendar"></i> Date Wise Expense Report
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/ExpReportDateWise.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" /> 
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label">End Date</label>
				    <div class="col-sm-8">
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
			<!-- /panel-body -->
		</div>
	</div>
<!-- Date Wise Disbursement Report End-->

</div>
<!-- /row -->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>