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
	$Type = $_POST['Type'];
	$Title = $_POST['Title'];


	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];


	if (empty($Title)) {
		$errMSG = "Please Enter  Title.";
	} else {
		$upload_dir = 'custom/pdf_files/'; // upload directory

		$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

		// valid image extensions
		$valid_extensions = array('pdf','jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $userpic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;
		//$userpic = rand(1000, 1000000) . "." . $imgExt;

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
		$stmt = $DB_con->prepare('INSERT INTO publish_result_routine (user_id,type,title,userPic,entry_date,status) 
															VALUES(:user_id,:Type,:Title,:upic,Now(),1)');

		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':Type', $Type);
		$stmt->bindParam(':Title', $Title);

		$stmt->bindParam(':upic', $userpic);

		if ($stmt->execute()) {
?>
			<script>
				alert('Successfully Added ...');
				window.location.href = 'publish';
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
      <h1>Publish - Result / Class Routine / Exam Routine  |   <span> <a href="publish">    <i class="bi bi-table"></i> </a> </span> </h1>
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

					$pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
					while ($pqrow = mysqli_fetch_array($pq)) {
					?>

						<input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
					<?php } ?>
				</tr>
				
				<tr>
					<td><label class="control-label">Type </label> </td>
					<td>
						<select class="form-select" Id="Type" name="Type" required>
							<option value="" required>Select Type</option>
							<option value="1">Result</option>
							<option value="2">Exam Routine</option>
							<option value="3">Class Routine</option>
						</select>
				</tr>

				<tr>
					<td><label class="control-label"> Title Name </label></td>
					<td><input class="form-control" type="text" name="Title" placeholder="Title Name" value="<?php echo $Title; ?>" required></td>
				</tr>

				<tr>
					<td><label class="control-label"> File Upload </label></td>
					<td><input class="input-group" type="file" name="user_image" /></td>
				</tr>
				
	<tr class="d-none">
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="datetime-local" name="EntryDate" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date("Y-m-d\TH:i:s"); ?>" ></td>
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