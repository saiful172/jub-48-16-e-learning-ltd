<?php require_once 'header.php'; ?> 
<link rel="stylesheet" href="css/buttons.css"> 

<center><h4><ol class="breadcrumb"> <li class="active">Product  Sale / Stock History  </li></ol></h4></center>	

<div class="col-md-2">  
<div class="buttons"> 
		<div class="col-md-12">
		<a href="products-add" class="btn btn-primary btn-w100"> <i class="glyphicon glyphicon-plus-sign"></i> Add New  </a>
		</div> 
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/view-product-stock" class="btn btn-success btn-w100 "> <i class="fa fa-file"></i>  Stock Report </a>
		</div>
			 

		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print </a>
		</div>
		
		
		<div class="col-md-12">
		<a href="product-history-report" class="btn btn-danger btn-w100"> <i class="fa fa-file"></i>  Report By Date </a>
		</div>
		
		<div class="col-md-12">
			<br>
		</div>
		
	
		
	<div class="col-md-12">
			<a class="btn btn-info btn-w100" href="category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="sub-category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Sub Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="brands"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Brands  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Products  </a> 
	   </div>
	   
	    <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product History  </a> 
	   </div>
		 
		
	</div>
	
  
</div>

<div class="col-md-10">

<div class="container">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading"> 
			 <i class="glyphicon glyphicon-check"></i>	Product History Report - ( Buy-Sale-Return-etc )
			</div>
			 
			<div class="panel-body">
				
				<form class="form-horizontal" action="product-history-report-byDate-open.php" method="post" id="getOrderReportForm">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date  </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date  " />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label"> End Date </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date  " />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> View Report</button>
				    </div>
				  </div>
				</form>

			</div>
			 
		</div>
	</div>
	 
	 
</div>


</div>
 

<script src="custom/js/report.js"></script>

<?php require_once '../includes/footer.php'; ?>