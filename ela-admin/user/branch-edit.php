<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


<?php
if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$stmt_edit = $DB_con->prepare('SELECT * FROM branch WHERE br_id=:uid');
	$stmt_edit->execute(array(':uid' => $id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
} else {
	header("Location: branch");
}

if (isset($_POST['btn_save_updates'])) {

	//$Product_Code = $_POST['Product_Code'];
	$BranchName = $_POST['BranchName'];
	$Address = $_POST['Address'];
	$Contact = $_POST['Contact'];
	$Email = $_POST['Email'];
	$DivisionName = $_POST['DivisionName'];

	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('UPDATE branch 
                            SET br_name=:BranchName,
                                br_address=:Address, 
                                br_contact=:Contact, 
                                br_mail=:Email,
                                div_id=:DivisionName
                          WHERE br_id = :uid');


		
		$stmt->bindParam(':BranchName', $BranchName);

		$stmt->bindParam(':Address', $Address);
		$stmt->bindParam(':Contact', $Contact);
		$stmt->bindParam(':Email', $Email);
		$stmt->bindParam(':DivisionName', $DivisionName);

		$stmt->bindParam(':uid', $id);

		if ($stmt->execute()) {
?>
			<script>
				alert('Data Successfully Add ...');
				window.location.href = 'branch';
			</script>
<?php
		} else {
			$errMSG = "Sorry Data Could Not Updated !";
		}
	}
}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Branch Info Edit</h1> <hr>
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


		<?php
		if (isset($errMSG)) {
		?>
			<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
			</div>
		<?php
		}
		?>


		<table class="table table-hover table-responsive">


			<tr>
				<td><label class="control-label">Branch Name</label></td>
				<td><input class="form-control" type="text" name="BranchName" value="<?php echo $br_name; ?>"></td>
			</tr>

			<tr>
                    <td><label class="control-label"> Division </label></td>
                    <td>
					<select name="DivisionName" id="DivisionName" class="form-select">
    <option value="">Select Division</option>
    <?php
    $ct = mysqli_query($con, "SELECT * FROM division WHERE user_id='" . $_SESSION['id'] . "'");
    while ($category = mysqli_fetch_assoc($ct)) {
        echo '<option value="' . $category['div_id'] . '" ' . 
             ($div_id == $category["div_id"] ? "selected" : "") . '>' . 
             $category['div_name'] . '</option>';
    }
    ?>
</select>

                    </td>
                  </tr>
			<tr>
				<td><label class="control-label"> Branch Address </label></td>
				<td>
					<input class="form-control" type="text" id="Address" name="Address" value="<?php echo $br_address; ?>" />
				</td>
			</tr>

			<tr>
				<td><label class="control-label"> Contact No.</label></td>
				<td>
					<input class="form-control" type="text" id="Contact" name="Contact" value="<?php echo $br_contact; ?>" />
				</td>
			</tr>

			<tr>
				<td><label class="control-label"> E-mail </label></td>
				<td>
					<input class="form-control" type="text" id="Email" name="Email" value="<?php echo $br_mail; ?>" />
				</td>
			</tr>


		</table>
		<button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update </button>
		<a class="btn btn-danger" href="branch"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>

	</form>
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>