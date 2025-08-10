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
		$stmt_delete = $DB_con->prepare('DELETE FROM option_status WHERE id=:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
	 
	}

?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Access - Option Status | <span> <a href="option-status-add"> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

<table  class="table table-responsive table-hover datatable" >
                        <thead>
                        <tr>
							<th>SL</th>
							<th>User</th>
							<th>Marketing</th>
							<th>Service Charge</th>
							<th>Quotation</th>
							<th>Expense</th>
							<th>Daily Task</th>
							<th>Daily Cash</th>
							 
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody>
							<?php
							  $sl=0;
								$eq=mysqli_query($con,"select * from option_status
                                left join `stuff` on stuff.userid=option_status.user_id   
								ORDER BY id ASC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['business_name']; ?></td>
											<td><?php echo $eqrow['mar_type']; ?></td>
											<td><?php echo $eqrow['sev_charg']; ?></td>
											<td><?php echo $eqrow['quot_type']; ?></td>
											<td><?php echo $eqrow['exp_type']; ?></td>
											<td><?php echo $eqrow['daily_task']; ?></td>
											<td><?php echo $eqrow['daily_cash']; ?></td>
											 
											
				<td><a  class="btn btn-info" href="option-status-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
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
	  
	  <?php include('../includes/footer.php');?>
	  
    </section>

  </main>
  




  <?php  require_once 'footer1.php'; ?>
