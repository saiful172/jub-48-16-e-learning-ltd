<?php require_once 'header.php'; ?>
<?php require_once 'more-fals/rpt-item-for-all-r.php'; ?>
<center><h4><ol class="breadcrumb"> <li class="active"> Profit Report - Short </li></ol></h4></center>

<div class="container">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				  <i class="glyphicon glyphicon-check"></i>	Product Buy-Sale-Profit Report ( Short ) 
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/prft_report_open_by_date_short.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date  " />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label">End Date </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date " />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> View Report</button>
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