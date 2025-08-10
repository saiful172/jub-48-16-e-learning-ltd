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
	$stmt_delete = $DB_con->prepare('DELETE FROM map WHERE mp_id =:uid');
	$stmt_delete->bindParam(':uid', $_GET['delete_id']);
	$stmt_delete->execute();

	//header("Location:group.php");
}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Map |  <span> <a href="Map-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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


				<!--<th>District Code</th>-->
				<th>Title</th>
				<th> Link </th>

				<th>Edit</th>

				<th>Delete</th>
			</tr>
		</thead>
						
              		<tbody id="tbody">
			<?php
			$eq = mysqli_query($con, "select * from map  ORDER BY mp_id DESC ");
			while ($eqrow = mysqli_fetch_array($eq)) {
				$eidm = $eqrow['mp_id'];
			?>
				<tr>


					<td><?php echo $eqrow['mp_title']; ?></td>
					<td><?php echo $eqrow['mp_link']; ?></td>


					<td><a class="btn btn-info" href="map-edit?edit_id=<?php echo $eqrow['mp_id']; ?>" title="click for edit" onclick="return confirm('Do you want to Edit ?')"><span class="bi bi-pencil-square"></span> Edit</a> </td>

					<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['mp_id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')">
							<span class="bi bi-trash"></span> Delete</a> </td>


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