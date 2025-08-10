<!DOCTYPE html>
<html lang="en">
<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Bank History |  <span> <a href="">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
    </div> 
	
    
	
	<section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
			  <?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>  
			  
</h5>
			  
<form class="form-horizontal" action="php_action/bank_history_report_single.php" method="post" id="getOrderReportForm1">
				<div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Bank Name</label>
				    <div class="col-sm-9">
				      <td> 
					 <select style="width:100%;" class="select-control" Id="BankID" name="BankID" required="" >
		<option value="#">  Select Bank </option>
				      	<?php 
				      	$sql = "SELECT  id,name FROM bank_name order by id asc ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select>
					  </td>
				    </div>
				  </div>
				
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success mt-2" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> view Report</button>
				    </div>
				  </div>
				</form>

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