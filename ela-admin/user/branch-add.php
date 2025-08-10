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
	$DivisionName = $_POST['DivisionName'];
	$BranchName = $_POST['BranchName'];
	$Address = $_POST['Address'];
	$Contact = $_POST['Contact'];
	$Email = $_POST['Email'];
	

	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];

	if (empty($Address)) {
		$errMSG = "Please Enter Address Name";
	} else if (empty($Contact)) {
		$errMSG = "Please Enter Contact Number .";
	} 


	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('INSERT INTO branch (user_id, br_name,br_address,br_contact,br_mail, div_id) 
			        VALUES(:UserId,:BranchName,:Address,:Contact,:Email, :DivisionName )');


		$stmt->bindParam(':UserId', $UserId);
		$stmt->bindParam(':DivisionName', $DivisionName);
		$stmt->bindParam(':BranchName', $BranchName);
		$stmt->bindParam(':Address', $Address);
		$stmt->bindParam(':Contact', $Contact);
		$stmt->bindParam(':Email', $Email);

		
		if ($stmt->execute()) {
?>
			<script>
				alert('Data Successfully Add ...');
				window.location.href = 'branch';
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
      <h1>Add New Branch |  <span> <a href="Branch">    <i class="bi bi-table"></i> </a> </span> </h1>
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

						<input class="form-control" type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>" />
					<?php } ?>
				</tr>

				<tr>
                    <td><label class="control-label"> Division </label></td>
                    <td>
                      <select name="DivisionName" id="DivisionName" class="form-select" required>
                        <option value="" required>Select Division</option>
                        <?php
                        $ct = mysqli_query($con, "SELECT * FROM division WHERE user_id='" . $_SESSION['id'] . "'");
                        while ($category = mysqli_fetch_assoc($ct)) {
                          echo '<option value="' . $category['div_id'] . '"  ' . ($category_id == $category["div_id"] ? "selected" : "") . '>' . $category['div_name'] . '</option>';
                        } ?>
                      </select>
                    </td>
                  </tr>

				<tr>
					<td><label class="control-label">Branch Name</label></td>
					<td><input class="form-control" type="text" id="BranchName" name="BranchName" placeholder="Branch Name" /></td>
				</tr>
				


				<tr>
					<td><label class="control-label"> Branch Address </label></td>
					<td><input class="form-control" type="text" id="Address" name="Address" placeholder="Branch Address" /></td>
				</tr>

				<tr>
					<td><label class="control-label"> Contact No. </label></td>
					<td>
						<input class="form-control" type="text" id="Contact" name="Contact" placeholder="Contact Number" />
					</td>
				</tr>

				<tr>
					<td><label class="control-label"> E-mail </label></td>
					<td>
						<input class="form-control" type="text" id="Email" name="Email" placeholder="Email" />
					</td>
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