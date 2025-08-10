
<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main1">

    <div class="pagetitle">
      <h1> Single Customer Sales / Statement Report </h1>
       <hr>
    </div> 


<section class="section">
      <div class="row">
	  
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body p-5">
				
				<form class="form-horizontal" action="php_action/sales_report_single_cust_by_date.php" method="post" id="getOrderReportForm2">
				
				<div class="row mb-3 mt-5">
                  <label for="CustId" class="col-sm-3 control-label">Customer Name</label>
                  <div class="col-sm-9">
                  <select style="width:85%;" class="form-control chosen-select" Id="CustId" name="CustId" required>
		<option value="" required>Select Customer Name</option>
		
				      	<?php 
				      	$sql = "SELECT  customer_id,customer_name,address, contact_info FROM customer where member_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]." - ".$row[2]." - ".$row[3]."</option>";
								} 
				      	?>
						
		</select>
				  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="startDate" class="col-sm-3 col-form-label">Start Date</label> 
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="endDate" class="col-sm-3 col-form-label">End Date</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                  </div>
                </div>
				
			 
                <div class="text-center">
				  <button type="submit" class="btn btn-primary" id="generateReportBtn"> <i class="bi bi-file-earmark-text"></i> Open Report</button>
                </div>
				  
				
				 
				</form>

		
			</div>
          </div>

        </div>
      </div>
    </section>

	
	 </main>
	
 

<?php  require_once 'footer1.php'; ?>


<script src="custom/js/report.js"></script>
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>
 