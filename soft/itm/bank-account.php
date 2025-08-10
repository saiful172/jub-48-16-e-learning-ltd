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
		$stmt_delete = $DB_con->prepare('DELETE FROM bank_money WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1> Main Accounts And Transactions |  <span> <a href="bank-account-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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
                                <th> SL</th>
                                <th> Bank</th>
								<th>Previous</th>
								<th>Today</th>
								<th>Current</th>
								<th>Reference</th>
								<th>Purpose</th>
								<th>Date</th>
								<th> Edit </th>
								
                            </tr>
                        </thead>
						
						
              
                        <tbody>

	
	
	<?php
	$eq=mysqli_query($con,"select * from bank_money 
	Left JOIN bank_name ON bank_name.id = bank_money.bank_id
	  ORDER BY bank_money.id asc  ");
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo $eqrow['name']; ?>  </td>
			<td><?php echo $eqrow['previous_amt']; ?>  </td>
			<td><?php echo $eqrow['today_amt']; ?>  </td>
			<td><?php echo $eqrow['recent_amt']; ?>  </td>
			<td><?php echo $eqrow['refer']; ?>  </td>
			<td><?php echo $eqrow['cuses']; ?>  </td>
			<td><?php echo date("d-M-Y", strtotime($eqrow['last_update'])); ?></td>
		
			<td><a class="btn btn-info" href="bank-account-edit?edit_id=<?php echo $eqrow['bank_id']; ?>" title="click for edit" onclick="return confirm('Do You Want Edit?')"><span class="glyphicon glyphicon-edit"></span> Edit</a></td> 
	   <!--		<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
		-->			
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