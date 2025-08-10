<?php require_once 'header.php'; ?>  

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
 
<center><h4><ol class="breadcrumb"> <li class="active">More Follow Up-Report  </li></ol></h4></center>	
		
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
	<div class="col-md-9">
	
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-list"></i>	Category Wise Follow-Up Report
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/follow-up-report-by-cat.php" method="post" id="getOrderReportForm">
				
				<div class="form-group">
				    <label for="Category" class="col-sm-3 control-label"> Category </label>
				    <div class="col-sm-9">
				     <select style="width:85%;" class="form-control chosen-select" Id="CatId" name="CatId" required="" >
		<option value="#">Select Category</option>
		
				      	<?php 
				      	$sql = "SELECT  distinct phone_book.category,phnbook_category.pb_cat_name   FROM phone_book 
						left join phnbook_category on phnbook_category.pb_cat_id=phone_book.category
						where phone_book.user_id ='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select>
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
	
	
	
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				<i class="glyphicon glyphicon-user"></i>	Follow-Up Report Name
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/follow-up-report.php" method="post" id="getOrderReportForm1">
				
				<div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Lead Name</label>
				    <div class="col-sm-9">
				     <select style="width:100%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Name</option>
		
				      	<?php 
				      	$sql = "SELECT distinct follow_up.cust_id,phone_book.lead_name,phone_book.contact_info FROM follow_up 
						left join phone_book on phone_book.lead_id=follow_up.cust_id
						where follow_up.user_id ='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]." - ".$row[2]."</option>";
								} 
				      	?>
		</select>
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
	
	
	
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				<i class="glyphicon glyphicon-envelope"></i>	Follow-Up Report By Email
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/follow-up-report.php" method="post" id="getOrderReportForm2">
				
				<div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Lead Email</label>
				    <div class="col-sm-9">
				     <select style="width:100%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Email</option>
		
				      	<?php 
				      	$sql = "SELECT distinct follow_up.cust_id,phone_book.lead_name,phone_book.email_num FROM follow_up 
						left join phone_book on phone_book.lead_id=follow_up.cust_id
						where follow_up.user_id ='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[2]." - ".$row[1]."</option>";
								} 
				      	?>
		</select>
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
   
	  
	<div class="col-md-7" >
		<div class="panel panel-info">
			<div class="panel-heading">
			
				<i class="glyphicon glyphicon-phone"></i>	Follow-Up Report Phone
			</div>
			 
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/follow-up-report.php" method="post" id="getOrderReportForm3">
				<div class="form-group">
				    <label for="Phone" class="col-sm-3 control-label"> Phone</label>
				    <div class="col-sm-9">
				     <select style="width:100%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select  Phone</option>
		
				      	<?php 
				      	$sql = "SELECT distinct follow_up.cust_id,phone_book.lead_name,phone_book.contact_info FROM follow_up 
						left join phone_book on phone_book.lead_id=follow_up.cust_id
						where follow_up.user_id ='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[2]." - ".$row[1]."</option>";
								} 
				      	?>
						
		</select>
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
	$('.chosen-select').chosen({width: "100%"});
</script>
 
