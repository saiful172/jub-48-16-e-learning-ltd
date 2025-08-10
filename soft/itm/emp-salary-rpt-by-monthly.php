<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="1">

    <div class="pagetitle text-center">
      <h1>  Employee Salary Report - Monthly</h1>
       <hr>
    </div> 
	
	
	    <section class="section">
      <div class="row">
	  
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body p-5">
			
			<form action="php_action/emp_sal_rpt_monthly.php" method="post" id="getOrderReportForm">
               
			   <div class="row mb-3 mt-5">
                  <label for="startDate" class="col-sm-3 col-form-label">Year</label>
                  <div class="col-sm-9">
                   <select class="form-select" style="width:100%;"  name="Year"  />
		<option value="#">Select Year</option> 
		<?php 
				      	$sql = "SELECT distinct year FROM employees_salary  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
		</select>
                  </div>
                </div>
				
				 <div class="row mb-3">
                  <label for="endDate" class="col-sm-3 col-form-label">Month</label>
                  <div class="col-sm-9">
                   <select class="form-select" style="width:100%;"  name="Month" >
		<option value="#">Select Month</option> 
		<?php 
				      	$sql = "SELECT distinct month FROM employees_salary  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} // while
								
				      	?>
		</select>
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
	

<script src="custom/js/report.js"></script>

<?php  require_once 'footer1.php'; ?>








