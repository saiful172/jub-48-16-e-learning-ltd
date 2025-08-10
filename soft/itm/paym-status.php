<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php
  
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM payment_status WHERE ps_id=:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
	 
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle"> 
	  <h1>Payment Status | <span> <a href="paym-status-add">  <i class="bi bi-plus-square-fill"></i> </a> </span>  </h1>
	  <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table width="100%" class="table table-hover datatable">
                <thead>
                        <tr>
                                
							
							<th>SL</th>
							<th>Status Name</th>
							 
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
						
                <tbody id="tbody">
							<?php
							  $sl=0;
								$eq=mysqli_query($con,"select * from payment_status
								where user_id='".$_SESSION['id']."'
								ORDER BY ps_id ASC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['ps_name']; ?></td>
											 
											
				<td><a  class="btn btn-info" href="paym-status-edit?edit_id=<?php echo $eqrow['ps_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['ps_id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
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