<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php
if (isset($_GET['delete_id'])) {
	// select image from db to delete
	$stmt_select = $DB_con->prepare('SELECT userPic FROM parner WHERE  pr_id =:uid');
	$stmt_select->execute(array(':uid' => $_GET['delete_id']));
	$imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
	//unlink("user_images/".$imgRow['userPic']);

	// it will delete an actual record from db
	$stmt_delete = $DB_con->prepare('DELETE FROM parner WHERE  pr_id =:uid');
	$stmt_delete->bindParam(':uid', $_GET['delete_id']);
	$stmt_delete->execute();

	//header("Location:customer.php");
}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Partner List  |  <span> <a href="parner-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
              <thead class="bg-light">
			<tr>

				<th> SL</th>
				<th> Name</th>
				<th>Details</th>
				<th>Picture</th>

				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
						
						
            <tbody id="tbody">
			<?php
			$sl = 0;
			$eq = mysqli_query($con, "select * from parner  where user_id='" . $_SESSION['id'] . "' ORDER BY pr_id desc   ");
			while ($eqrow = mysqli_fetch_array($eq)) {

			?>
				<tr>
					<td><?php echo  ++$sl; ?></td>
					<td><?php echo $eqrow['pr_name']; ?></td>
					<td><?php echo $eqrow['pr_details']; ?></td>
					<td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="65px;" width="60px;" /></td>

					<td><a class="btn btn-info" href="parner-edit?edit_id=<?php echo $eqrow['pr_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="bi bi-pencil-square"></span> Edit</a> </td>
					<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['pr_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="bi bi-trash"></span> Delete</a> </td>


				</tr>
			<?php
			}
			?>

		</tbody>
              </table>
            
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>