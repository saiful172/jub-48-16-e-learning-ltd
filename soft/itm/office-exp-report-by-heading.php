<?php require_once 'header.php'; ?> 
<link rel="stylesheet" href="css/buttons.css">

<center><h4><ol class="breadcrumb"><li>Office Expense Report</li> </ol> </h4></center>
<div class="col-md-2">  
<div class="buttons"> 

<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="Expense-Add"  > <span class="glyphicon glyphicon-plus"></span> Add New   </a> 
		</div>

		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="Expense"  > <span class="glyphicon glyphicon-list"></span> Expense List  </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="exp-name-office"  > <span class="glyphicon glyphicon-list-alt"></span>  Category   </a> 
		 </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="exp-report-by-date"  > <span class="glyphicon glyphicon-file"></span> Report By Date </a>
	   </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="office-exp-report-by-heading"  > <span class="glyphicon glyphicon-file"></span> Report By Category </a> 
		 
		</div>
		
		<div class="col-md-12">
		</div> 
		
	</div>
	
	 
</div>

<div class="col-md-10">
<div class="container">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-check"></i>	Office Expense Report By Heading
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/office_exp_report_by_heading.php" method="post" id="getOrderReportForm">
				
				 <div class="form-group">
				    <label for="ExpId" class="col-sm-3 control-label">Select Heading</label>
				    <div class="col-sm-9">
				      <td> <select style="width:100%;" class="form-control chosen-select" Id="ExpId" name="ExpId" required=""/>
		<option value="#">Select Heading</option>
				      	<?php 
				      	$sql = "SELECT distinct expense.expense_name,office_exp_name.name FROM expense 
						left join office_exp_name on office_exp_name.of_id=expense.expense_name
						where expense.user_id='".$_SESSION['id']."'
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