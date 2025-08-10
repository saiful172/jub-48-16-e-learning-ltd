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
     <h1> Bank Transaction History |  <span> <a href="bank-account-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
                <thead>				
                            <th>SL</th>
                    <th>Date</th>
                    <th>Cause</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Amount In</th>
                    <th>Amount Out</th>
                    <th>Current Balance</th> 
                    <th>Received By</th>
							
                        </thead>
						
						
               <tbody>

	
	
	<?php
	$sl=0;
	$eq=mysqli_query($con,"select * from bank_money_history 
	Left JOIN company_group ON company_group.com_id = bank_money_history.com_group_id
	Left JOIN project ON project.pro_id = bank_money_history.project_id
	Left JOIN bank_name ON bank_name.id = bank_money_history.bank_id
	where bank_money_history.user_id='".$_SESSION['id']."' ORDER BY bank_money_history.id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo date("M d,Y", strtotime($eqrow['last_update'])); ?></td>
            <td><?php echo $eqrow['cuses']; ?></td>
			<td><?php echo $eqrow['com_name']; ?>-<?php echo $eqrow['pro_name']; ?>  </td>
			<td><?php echo $eqrow['name']; ?>  </td>
			 
			<td><?php echo $eqrow['money_in']; ?>  </td>
			<td><?php echo $eqrow['money_out']; ?>  </td>
			<td><?php echo $eqrow['recent_amt']; ?>  </td>
			
			<td><?php echo $eqrow['refer']; ?>  </td>
			
			
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