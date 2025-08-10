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
      <h1>  Item Wise Buy / Sale / Return </h1> 
       <hr>
    </div> 
	
	
	    <section class="section">
      <div class="row">
	  
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body p-5">
			
			<form action="php_action/item-wise-buy-sale.php" method="post" id="getOrderReportForm">
               
			   <div class="row mb-3 mt-5">
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
	

<script src="custom/js/report.js"></script>

<?php  require_once 'footer1.php'; ?>








