<?php require_once 'header.php'; ?>
<?php require_once 'more-fals/rpt-item-for-all-r-sup.php'; ?>
<h4><ol class="breadcrumb"> <li class="active text-center"> Item Wise Product Purchase Report</li></ol></h4>
 
<div class="container">

<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Supplier Daily  Product Purchase - Item Wise
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/daily-product-buy-open-sup.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date " />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date " />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> View  Report  </button>
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

<?php require_once '../includes/footer.php'; ?>