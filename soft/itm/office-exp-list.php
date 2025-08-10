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
		$stmt_delete = $DB_con->prepare('DELETE FROM expense WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		 
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle"> 
	  <h1>Office Expenses | <span> <a href="office-exp-add">  <i class="bi bi-plus-square-fill"></i> </a> </span>  </h1>
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
							<th>Name</th>
							<th>Details</th>
							<th>Qty</th>
							<th>Taka</th>
							<th>Reference </th>
							<th> Date</th>
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
                 <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from expense

                              left join office_exp_name on office_exp_name.of_id=expense.expense_name
							  where expense.user_id='".$_SESSION['id']."' ORDER BY expense.id DESC limit 300");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td> 
											<td><?php echo $eqrow['name']; ?></td>
											<td><?php echo $eqrow['exp_details']; ?></td>
											<td><?php echo $eqrow['ammount']; ?></td>
											<td><?php echo $eqrow['expense_cost']; ?></td>
											<td><?php echo $eqrow['reference']; ?></td>
											<td><?php echo date("M d,Y", strtotime($eqrow['entry_date'])); ?></td>
											
											
				<td><a  class="btn-sm btn-info" href="office-exp-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn-sm btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
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