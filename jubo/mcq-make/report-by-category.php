<?php require_once 'header.php'; ?>

<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<div class="container">

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Question
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/report-by-category.php" method="post" id="getOrderReportForm">
				
				<div class="form-group">
				    <label for="startDate" class="col-sm-4 control-label">Question Name</label>
				    <div class="col-sm-8">
				     <select style="width:85%;" class="form-control chosen-select" Id="Question" name="Question" >
		<option value="#">Select Question Name</option>
		
				      	<?php 
				      	$sql = "SELECT  id, category FROM question_name ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-10">
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
 