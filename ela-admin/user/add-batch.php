<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php

if (isset($_POST['btnsave'])) {

	$UserId = $_POST['UserId'];
	$BatchName = $_POST['BatchName'];
	$BatchNo = $_POST['BatchNo'];
	$Trainer = $_POST['Trainer'];
	$Date = $_POST['Date'];


	if (empty($BatchName)) {
		$errMSG = "Please Enter Batch Name.";
	} else if (empty($BatchNo)) {
		$errMSG = "Please Enter Batch No.";
	}



	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('INSERT INTO batch (user_id,batch_name,batch_no,trainer,entry_date) VALUES(:UserId,:BatchName,:BatchNo,:Trainer,:Date)');


		$stmt->bindParam(':UserId', $UserId);
		$stmt->bindParam(':BatchName', $BatchName);
		$stmt->bindParam(':BatchNo', $BatchNo);
		$stmt->bindParam(':Trainer', $Trainer);
		$stmt->bindParam(':Date', $Date);

		if ($stmt->execute()) {
?>
			<script>
				alert('Batch Add Successful');
				window.location.href = 'batch-list';
			</script>
<?php
		} else {
			$errMSG = "error while inserting....";
		}
	}
}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Batch |  <span> <a href="batch-list">    <i class="bi bi-table"></i> </a> </span> </h1>
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
			  
		<form method="post" enctype="multipart/form-data" class="form-horizontal">

			<table class="table table-hover table-responsive">

				<tr>

					<?php
					$pq = mysqli_query($con, "select * from user where userid='" . $_SESSION['id'] . "'");
					while ($pqrow = mysqli_fetch_array($pq)) {
					?>

						<input class="form-control" type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>" />
					<?php } ?>
				</tr>



				<tr>
					<td><label class="control-label">Batch Name</label></td>
					<td><input class="form-control" type="text" name="BatchName" placeholder="Batch Name"></td>
				</tr>


				<tr>
					<td><label class="control-label">Batch No </label></td>
					<td><input class="form-control" type="text" name="BatchNo" placeholder="Batch No"></td>
				</tr>

				<tr>
					<td><label class="control-label">Trainer Name </label></td>
					<td><input class="form-control" type="text" name="Trainer" placeholder="Trainer Name"></td>
				</tr>

				<tr>
					<td><label class="control-label">Date </label></td>
					<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d"); ?>"></td>
				</tr>

				

			</table>

			<button type="submit" name="btnsave" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>

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