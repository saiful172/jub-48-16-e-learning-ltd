<?php require_once 'header.php';  
require_once 'more-fals/rpt-item-for-all-r.php'; 
?>
<h4><ol class="breadcrumb"> <li class="active"> Product Sale - Item Wise</li></ol></h4>


<div class="container">

<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Daily  Product Sale - Item Wise
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/daily_product_sales_open.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date " />
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