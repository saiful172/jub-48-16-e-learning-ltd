<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php

if (isset($_GET['delete_id'])) {


	// it will delete an actual record from db
	$stmt_delete = $DB_con->prepare('DELETE FROM year_name WHERE yer_id =:uid');
	$stmt_delete->bindParam(':uid', $_GET['delete_id']);
	$stmt_delete->execute();

	//header("Location:group.php");
}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Year |  <span> <a href="add-year">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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


			
				<th>Year</th>

				<th>Edit</th>

				<th>Delete</th>
			</tr>
		</thead>
						
		<tbody id="tbody">
			<?php
			$eq = mysqli_query($con, "select * from year_name  ORDER BY yer_id DESC ");
			while ($eqrow = mysqli_fetch_array($eq)) {
				$eidm = $eqrow['yer_id'];
			?>
				<tr>


					<!--<td><?php echo $eqrow['yer_id']; ?></td>-->
					<td><?php echo $eqrow['yer_name']; ?></td>


					<td><a class="btn btn-info" href="edit-year?edit_id=<?php echo $eqrow['yer_id']; ?>" title="click for edit" onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>

					<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['yer_id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')">
							<span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>


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