<?php require_once 'header.php'; ?>  

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
 
<center><h4><ol class="breadcrumb"> <li class="active">Follow Up-Report By Date  </li></ol></h4></center>	
		
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="follow-up"> <span class="glyphicon glyphicon-plus"></span> New Follow Up</a> 
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="follow"> <span class="glyphicon glyphicon-user"></span> Follow Up List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="follow-up-report-by-date"> <span class="glyphicon glyphicon-file"></span> Report By Date</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="follow-up-report"> <span class="glyphicon glyphicon-file"></span> More Type Report </a> 
</div>

 
<div class="col-md-12">	 
<br>
</div>
 
<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads"> <span class="glyphicon glyphicon-user"></span> Leads</a>
</div>

<div class="col-md-12">	 
<br>
</div>
       
</div>
</div>
 
 
	<div class="col-md-10"> 
	
	<div class="container">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
			<i class="glyphicon glyphicon-calendar"></i>	Date Wise Follow-Up Report
			</div> 
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/follow-up-report-by-date.php" method="post" id="getOrderReportForm4">
				
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
				      <button type="submit" class="btn btn-success report-btn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report</button>
				    </div>
				  </div>
				  
				</form>

			</div> 
		</div>
	</div>
	</div>
	  
	  
	
		
	
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>
	 

<script src="custom/js/report.js"></script>
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "90%"});
</script>
 