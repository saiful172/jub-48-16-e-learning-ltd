<?php require_once 'session.php'; ?>
<?php require_once 'header.php'; ?>
<center><h4><ol class="breadcrumb"><li >Bank Report By Date </li> </ol> </h4></center>
<link rel="stylesheet" href="css/buttons.css">
<?php require_once 'more-fals/bank-option-link.php'; ?>

<div class="container">
<div class="col-md-7">
<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
			<i class="glyphicon glyphicon-check"></i> Bank Report By Date
			</div>
		 
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/bank_report_by_date.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">From Date</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="From Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label">To Date</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="To Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-eye-open"></i>View Report</button>
				    </div>
				  </div>
				</form>

			</div>
		 
		</div>
		 
	</div> 
</div> 

</div>


<?php include '../includes/footer.php'; ?>


<script src="custom/js/report.js"></script>

