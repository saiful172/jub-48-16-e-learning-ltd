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
	$GrpName = $_POST['GrpName'];



	if (empty($GrpName)) {
		$errMSG = "Please Enter Group Name.";
	}




	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('INSERT INTO bld_grp (user_id,bld_name) VALUES(:UserId,:GrpName)');


		$stmt->bindParam(':UserId', $UserId);
		$stmt->bindParam(':GrpName', $GrpName);


		if ($stmt->execute()) {
?>
			<script>
				alert(' Update Successful...');
				window.location.href = 'blood-grp-list';
			</script>
<?php
		}

		else {
			$errMSG = "error while inserting....";
		}
	}
}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Blood Group |  <span> <a href="blood-grp-list">    <i class="bi bi-table"></i> </a> </span> </h1>
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
					<td><label class="control-label">Group Name</label></td>
					<td><input class="form-control" type="text" name="GrpName" placeholder="Group Name"></td>
				</tr>



			</table>


				<button type="submit" name="btnsave" class="btn btn-primary">
							<span class="glyphicon glyphicon-save"></span> &nbsp; Save
						</button>


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