<?php require_once 'header.php'; ?> 
<link rel="stylesheet" href="css/buttons.css"> 

<center><h4><ol class="breadcrumb"><li> Income  Report By  Project</li> </ol> </h4></center>
 <?php require_once 'more-fals/project-link-btn.php'; ?> 

<div class="container">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i> Income Report By Project  
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/project-income-report-by-heading" method="post" id="getOrderReportForm">
				
				 <div class="form-group">
				    <label for="ExpId" class="col-sm-3 control-label">Select project</label>
				    <div class="col-sm-9">
				      <td> <select style="width:100%;" class="form-control chosen-select" Id="ExpId" name="ExpId" required=""/>
		<option value="#">Select project</option>
				      	<?php 
				      	$sql = "SELECT distinct prjct_income.prj_name,prjct_name.pj_name FROM prjct_income 
						left join prjct_name on prjct_name.pj_id=prjct_income.prj_name
						where prjct_income.user_id='".$_SESSION['id']."'
						";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>
				    </div>
				  </div>
				 
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
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
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i>View  Report  </button>
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
	$('.chosen-select').chosen({width: "100%"});
</script>

<?php require_once '../includes/footer.php'; ?>