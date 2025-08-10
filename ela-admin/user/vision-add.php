<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once 'head_link.php'; ?>

</head>

<body>

	<?php require_once 'header1.php'; ?>

	<?php

	error_reporting(~E_NOTICE); // avoid notice
	if (isset($_POST['btnsave'])) {


		$user_id = $_POST['user_id'];

		$Name = $_POST['Name'];
		$Details = $_POST['Details'];


		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];


		if (empty($Name)) {
			$errMSG = "Please Enter Service .";
		} else {
			$upload_dir = 'user_images/'; // upload directory

			$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image
			$userpic = rand(1000, 1000000) . "." . $imgExt;

			// allow valid image file formats
			if (in_array($imgExt, $valid_extensions)) {
				// Check file size '5MB'
				if ($imgSize < 5000000) {
					move_uploaded_file($tmp_dir, $upload_dir . $userpic);
				} else {
					$errMSG = "Sorry, your file is too large.";
				}
			}
			//else{
			//	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			//}
		}


		// if no error occured, continue ....
		if (!isset($errMSG)) {
			$stmt = $DB_con->prepare('INSERT INTO vision (user_id,name,details,userPic) 
															VALUES(:user_id,:Name,:Details,:upic)');



			$stmt->bindParam(':user_id', $user_id);

			$stmt->bindParam(':Name', $Name);
			$stmt->bindParam(':Details', $Details);

			$stmt->bindParam(':upic', $userpic);

			if ($stmt->execute()) {
	?>
				<script>
					alert('Successfully Added ...');
					window.location.href = 'vision';
				</script>
	<?php
			} else {
				$errMSG = "error while inserting....";
			}
		}
	}
	?>

	<?php require_once 'sidebar.php'; ?>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Add New Vision | <span> <a href="Vision"> <i class="bi bi-table"></i> </a> </span> </h1>
			<hr>
		</div>

		<section class="section">
			<div class="row">
				<div class="col-lg-10">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">
								<?php
								if (isset($errMSG)) {
								?>
									<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
									</div>
								<?php
								} else if (isset($successMSG)) {
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
										$pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
										while ($pqrow = mysqli_fetch_array($pq)) {
										?>

											<input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
										<?php } ?>
									</tr>


									<tr>
										<td><label class="control-label"> Name </label></td>
										<td><input class="form-control" type="text" name="Name" placeholder=" Name" value="<?php echo $Name; ?>" /></td>
									</tr>

									<tr>
										<td><label class="control-label"> Details </label></td>
										<td><textarea class="tinymce-editor" name="Details" placeholder="Details"><?php echo $Details; ?></textarea></td>
									</tr>


									<tr>
										<td><label class="control-label">Picture </label></td>
										<td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
									</tr>


								</table>
								<tr>
									<td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
											<span class="glyphicon glyphicon-save"></span> &nbsp; save
										</button>
									</td>
								</tr>


							</form>


						</div>
					</div>


				</div>


		</section>

	</main>

	<?php
	require_once 'footer1.php';

	require_once('summernote_link.php');
	summernote();
	?>


	<script src="js/chosen.js"></script>
	<script type="text/javascript">
		$('.chosen-select').chosen({
			width: "100%"
		});
	</script>