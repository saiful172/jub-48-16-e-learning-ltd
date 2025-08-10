<?php require_once 'header.php'; ?> 
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<div class="container">

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Customer Sales Report ( Single By Name)
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/sales_report_by_single_cust.php" method="post" id="getOrderReportForm">
				<div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Customer Name</label>
				    <div class="col-sm-10">
				     <select style="width:85%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Customer Name</option>
		
				      	<?php 
				      	$sql = "SELECT  customer_id,customer_name FROM customer  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
		</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Customer Sales Report ( Single By Phone Number )
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/sales_report_by_single_cust.php" method="post" id="getOrderReportForm2">
				<div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Customer Phone</label>
				    <div class="col-sm-10">
				     <select style="width:85%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Customer Phone</option>
		
				      	<?php 
				      	$sql = "SELECT  customer_id,contact_info FROM customer  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
		</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
</div>


<script src="custom/js/report.js"></script>
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "90%"});
</script>

<?php require_once '../includes/footer.php'; ?>