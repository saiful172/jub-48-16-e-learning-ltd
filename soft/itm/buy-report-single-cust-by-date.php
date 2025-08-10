<?php require_once 'header.php'; ?> 
<?php require_once 'more-fals/rpt-item-for-all-r-sup.php'; ?>
<h4><ol class="breadcrumb"> <li class="active text-center"> Date Wise Purchase Report - Single Supplier</li></ol></h4>

<div class="container">

<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Supplier Purchase Report( Single ) - By Name
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/buy-report-single-cust-by-date.php" method="post" id="getOrderReportForm">
				<div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Supplier By Name</label>
				    <div class="col-sm-9">
				         <select style="width:100%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Supplier </option>
		
				      	<?php 
				      	$sql = "SELECT  sup_id,supplier_name FROM supplier  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
		</select>
				    </div>
				  </div>
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
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>  Open Report</button>
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

<!-- /row -->



<script src="custom/js/report.js"></script>
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>

<?php require_once '../includes/footer.php'; ?>