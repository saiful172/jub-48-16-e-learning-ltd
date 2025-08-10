
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<script src="js/search.js"></script>
<style>#btn{text-align:center;}</style>
</head>
<body>

<h4> <ol class="breadcrumb"><li> Showroom Product Report </li> </ol> </h4>
<div class="row">
<!-- Date Wise Disbursement Report Start-->
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class=" 	glyphicon glyphicon-file"></i> Showroom Product Report
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="product_depo_show.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="Voucher" class="col-sm-3 control-label">Select Showroom</label>
				    <div class="col-sm-8">
				      <select class="form-control" style="width:100%;"  name="Depo"  />
		<option value="#">Select Showroom</option> 
		<?php 
				      	$sql = "SELECT distinct userid,stuff_name  FROM stuff where status=1 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select>
				    </div>
				  </div>
				  

				 
				  <div class="form-group">
				    <div id="btn" class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-file"></i> Open Report</button>
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



<?php require_once '../includes/footer.php'; ?>