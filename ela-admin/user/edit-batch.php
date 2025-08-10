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
	$stmt_edit = $DB_con->prepare('SELECT * FROM batch WHERE id =:uid');
	$stmt_edit->execute(array(':uid' => $id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
} else {
	header("Location: batch-list");
}



if (isset($_POST['btn_save_updates'])) {

	$BatchName = $_POST['BatchName'];
	$BatchNo = $_POST['BatchNo'];
	$Trainer = $_POST['Trainer'];
	$Date = $_POST['Date'];

	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('UPDATE batch 
									     SET batch_name=:BatchName, 
										     batch_no=:BatchNo, 
										     trainer=:Trainer,
										     entry_date=:Date 
											 
								       WHERE  id = :uid');




		$stmt->bindParam(':BatchName', $BatchName);
		$stmt->bindParam(':BatchNo', $BatchNo);
		$stmt->bindParam(':Trainer', $Trainer);
		$stmt->bindParam(':Date', $Date);

		$stmt->bindParam(':uid', $id);

		if ($stmt->execute()) {
?>
			<script>
				alert(' Update Successfull... ');
				window.location.href = 'batch-list';
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
      <h1>Batch Edit</h1> <hr>
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
						<td><label class="control-label">Batch Name</label></td>
						<td><input class="form-control" type="text" name="BatchName" value="<?php echo $batch_name; ?>"></td>
					</tr>


					<tr>
						<td><label class="control-label">Batch No.</label></td>
						<td><input class="form-control" type="text" name="BatchNo" value="<?php echo $batch_no; ?>"></td>
					</tr>

					<tr>
						<td><label class="control-label">Trainer Name </label></td>
						<td><input class="form-control" type="text" name="Trainer" value="<?php echo $trainer; ?>"></td>
					</tr>

					<tr>
						<td><label class="control-label">Date </label></td>
						<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date; ?>"></td>
					</tr>

					

				</table>
				<button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update </button>
				<a class="btn btn-danger" href="batch-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>


			</form>
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>