<?php require_once 'header.php'; ?>



<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Customer Sales Report - Date Wise  ( Single )
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReportShortSingle.php" method="post" id="getOrderReportForm">
				<div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Customer ID</label>
				    <div class="col-sm-10">
				      <td> <input  type="text" class="form-control" id="CustId" name="CustId" placeholder="Please Enter Customer Id Here" autocomplete="off" />  </td>
				    </div>
				  </div>
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
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->



<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>