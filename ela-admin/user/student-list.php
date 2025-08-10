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
	$stmt_select = $DB_con->prepare('SELECT userPic FROM students WHERE student_id =:uid');
	$stmt_select->execute(array(':uid' => $_GET['delete_id']));
	$imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
	//unlink("user_images/".$imgRow['userPic']);

	// it will delete an actual record from db
	$stmt_delete = $DB_con->prepare('DELETE FROM students WHERE student_id =:uid');
	$stmt_delete->bindParam(':uid', $_GET['delete_id']);
	$stmt_delete->execute();

	//header("Location:students.php");
}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Student List |  <span> <a href="add-student">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
            <thead>

			<tr>

				<th>SL</th>
				<th>No</th>
				<th>Id</th>
				<th>Name</th>
				<th>Batch</th>
				<th>Course</th>
				<th>Institute</th>
				<th>Phone</th>
				<th>Village</th>
				<th>Photo</th>

				<th>Details</th>
				<th>Edit</th>
			</tr>
		</thead>
						
						
		<tbody id="tbody">
			<?php
			$sl = 0;
			$eq = mysqli_query($con, "select * from students  where status=1 and user_id='" . $_SESSION['id'] . "' ORDER BY student_id desc ");
			while ($eqrow = mysqli_fetch_array($eq)) {
			?>
				<tr>

					<td><?php echo ++$sl; ?></td>
					<td><?php echo $eqrow['student_no']; ?></td>
					<td><?php echo $eqrow['student_id']; ?></td>
					<td><?php echo $eqrow['student_name']; ?></td>
					<td><?php echo $eqrow['batch_no']; ?></td>
					<td><?php echo $eqrow['course_name']; ?></td>
					<td><?php echo $eqrow['institute_name']; ?></td>
					<td><?php echo $eqrow['student_phone']; ?></td>
					<td><?php echo $eqrow['pre_vill']; ?></td>
					<td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>

					<td><a class="btn btn-info" href="details-student?edit_id=<?php echo $eqrow['student_id']; ?>" title="Click for Details"><span class="glyphicon glyphicon-edit"></span> Details</a> </td>
					<td><a class="btn btn-info" href="edit-student?edit_id=<?php echo $eqrow['student_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
					<!--    <td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['student_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td> -->


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