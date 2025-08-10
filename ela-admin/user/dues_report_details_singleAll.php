<?php require_once 'header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i> সিঙ্গেল বাকীর রিপোর্ট
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getDuesDetailsSingle.php" method="post" id="getOrderReportForm1">
				<div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">কাষ্টমার আইডি</label>
				    <div class="col-sm-10">
				      <td> <input  type="text" class="form-control" id="CustId" name="CustId" placeholder="এখানে কাষ্টমার আইডি দিন" autocomplete="off" />  </td>
				    </div>
				  </div>
				
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> রিপোর্ট দেখুন</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	
	
	
		<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i> সিঙ্গেল বাকীর রিপোর্ট - তারিখ অনুযায়ী
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getDuesDetailsSingleDate.php" method="post" id="getOrderReportForm">
				<div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">কাষ্টমার আইডি</label>
				    <div class="col-sm-10">
				      <td> <input  type="text" class="form-control" id="CustId" name="CustId" placeholder="এখানে কাষ্টমার আইডি দিন" autocomplete="off" />  </td>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">তারিখ হতে</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="তারিখ হতে" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">তারিখ পর্যন্ত</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="তারিখ পর্যন্ত" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> রিপোর্ট দেখুন</button>
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