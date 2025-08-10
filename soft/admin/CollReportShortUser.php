<?php require_once 'header.php'; ?> 

<center><h4> <ol class="breadcrumb"><li > Date Wise Collection Report Short - By User</li> </ol> </h4></center>
<div class="container">

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<i class="glyphicon glyphicon-check"></i>	Collection Report Short - By User
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/CollReportShortUser.php" method="post"  id="getOrderReportForm">
				
				<div class="form-group">
				    <label for="UserId" class="col-sm-2 control-label">Select User </label>
				    <div class="col-sm-10">
				      <td> <select style="width:100%;" class="form-control" Id="UserId" name="UserId" required="" >
		<option value="#">SELECT USER</option>
				      	<?php 
				      	$sql = "SELECT  userid,stuff_name FROM stuff where status=1";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>   View Report</button>
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

</div>



<script src="custom/js/report.js"></script>

<?php require_once '../includes/footer.php'; ?>