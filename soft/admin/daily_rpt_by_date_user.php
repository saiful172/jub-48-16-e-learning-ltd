
<?php require_once 'header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	 Sales  Report  Date Wise ( Sort )
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="daily_rpt_open_by_date_user.php" method="post" id="getOrderReportForm">
				
				<div class="form-group">
				    <label for="UserId" class="col-sm-2 control-label">Customer   Id</label>
				    <div class="col-sm-10">
				      <td> <select style="width:100%;" class="form-control" Id="UserId" name="UserId" required=""/>
		<option value="#">Select User</option>
				      	<?php 
				      	$sql = "SELECT  userid,stuff_name FROM stuff";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date  " />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date  " />
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
<!-- /row -->


<script src="custom/js/report.js"></script>

<?php require_once '../includes/footer.php'; ?>