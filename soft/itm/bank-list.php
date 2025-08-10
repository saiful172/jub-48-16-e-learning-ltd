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
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM bank_name WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1> Bank Name |  <span> <a href="bank-list-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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
							<th>Bank Name</th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                        </thead>
						
						
                <tbody id="tbody">
							<?php
							    $date=date("Y/m/d");
								$eq=mysqli_query($con,"select * from bank_name   order by id asc ");
								while($eqrow=mysqli_fetch_array($eq)){
									 
									?>
										<tr> 
										
										<td><?php echo ++$sl; ?>  </td>
											<td><?php echo $eqrow['name']; ?></td>
											
											
				<td><a  class="btn btn-info" href="bank-list-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span>Edit</a> </td>
			 
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			 
				
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