<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php

error_reporting(~E_NOTICE); // avoid notice
if (isset($_POST['btnsave'])) {


	$user_id = $_POST['user_id'];

	$Facebook = $_POST['Facebook'];
	$Twitter = $_POST['Twitter'];
	$YouTube = $_POST['YouTube'];
	$Instagram = $_POST['Instagram'];

	if (empty($Facebook)) {
		$errMSG = "Please Enter Facebook Link ";
	}

	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('INSERT INTO social_media (user_id,facebook,twitter,youtube,instagram) 
															VALUES(:user_id,:Facebook,:Twitter,:YouTube,:Instagram)');



		$stmt->bindParam(':user_id', $user_id);

		$stmt->bindParam(':Facebook', $Facebook);
		$stmt->bindParam(':Twitter', $Twitter);
		$stmt->bindParam(':YouTube', $YouTube);
		$stmt->bindParam(':Instagram', $Instagram);

		if ($stmt->execute()) {
			$successMSG = " New Social Media Add Succesfully  ...";
			//header("refresh:2; customer.php"); // redirects image view page after 5 seconds.
		} else {
			$errMSG = "error while inserting....";
		}
	}
}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Social Media |  <span> <a href="social-media">    <i class="bi bi-table"></i> </a> </span> </h1>
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

				include('../includes/conn.php');
				$pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
				while ($pqrow = mysqli_fetch_array($pq)) {
				?>

					<input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
				<?php } ?>
			</tr>


			<tr>
				<td><label class="control-label"> Facebook </label></td>
				<td><input class="form-control" type="text" name="Facebook" placeholder="Facebook Link" value="<?php echo $Facebook; ?>" /></td>
			</tr>

			<tr>
				<td><label class="control-label"> Twitter </label></td>
				<td><input class="form-control" type="text" name="Twitter" placeholder="Twitter Link" value="<?php echo $Twitter; ?>" /></td>
			</tr>

			<tr>
				<td><label class="control-label"> You Tube </label></td>
				<td><input class="form-control" type="text" name="YouTube" placeholder="You Tube Link" value="<?php echo $YouTube; ?>" /></td>
			</tr>

			<tr>
				<td><label class="control-label"> Instagram </label></td>
				<td><input class="form-control" type="text" name="Instagram" placeholder="Instagram" value="<?php echo $Instagram; ?>" /></td>
			</tr>


			<tr>
				<td><label class="control-label">Choose Picture </label></td>
				<td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
			</tr>

			

		</table>

			<button type="submit" name="btnsave" class="btn btn-primary">
						<span class="glyphicon glyphicon-save"></span> &nbsp; save
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