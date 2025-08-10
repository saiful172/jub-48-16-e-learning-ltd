<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Name = $_POST['Name'];
		
		
		
		if(empty($Name)){
			$errMSG = "Please Enter Office Expense Name.";
		}
		 
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO office_exp_name (user_id,name) VALUES(:UserId,:Name)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Name',$Name);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='exp-name-list';
				</script>
          <?php	
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Lead Report |  <span> <a href="lead-list">    <i class="bi bi-table"></i> </a> </span> </h1>
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

			<h4>Category Wise Lead Report</h4>
			
			
			<form class="form-horizontal" action="php_action/leads-report-by-cat.php" method="post" id="getOrderReportForm2">
				
				<div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label"> </label>
				    <div class="col-sm-9">
				     <select style="width:85%;" class="form-control chosen-select" Id="CatId" name="CatId" required="" >
					<option value="#">Select Lead Category</option>
		
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
				      <button type="submit" class="btn btn-success report-btn mt-2" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report</button>
				    </div>
				  </div>
				</form>  
				
				
			<h4 class="mt-5">Date Wise Lead Report</h4>	
			
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/leads-report-by-date.php" method="post" id="getOrderReportForm1">
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-3 control-label">Start Date</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-3 control-label mt-2">End Date</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-10">
				      <button type="submit" class="btn btn-success report-btn mt-2" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report</button>
				    </div>
				  </div>
				</form>

			</div> 
				
				


          
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>