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
		$stmt_delete = $DB_con->prepare('DELETE FROM orders_dues WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Salary History </h1>
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
                                <th>Date</th>
                                <th>ID</th>
                                <th>Year </th>
                                <th>Month</th>
                                <th>Name</th>
								<th> Position</th>
								<th> Salary</th>
								<th> Bonus</th>
								<th> Salary+Bonus</th>
								<th> Adv.Pay </th>
								<th> Sal.Pay  </th>
								<th> Total Paid </th>
								<th> Due</th>
								<th> Status</th> 
                            </tr>
							
                        </thead>
						
						
              <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from employees_salary_details  
	Left JOIN employees ON employees.id = employees_salary_details.emp_id
	where employees_salary_details.user_id='".$_SESSION['id']."' ORDER BY employees_salary_details.id DESC  ");
	
	$GTotalPaid= "";
	while($eqrow=mysqli_fetch_array($eq)){
	$GTotalPaid=$eqrow['adv_paid'] + $eqrow['full_paid'] ;
	
	?>
			<tr>
			<td><?php echo date("M d,Y", strtotime($eqrow['entry_date'])); ?></td>
			
			<td><?php echo $eqrow['id']; ?></td>
			<td><?php echo $eqrow['year']; ?></td>
			<td><?php echo $eqrow['month']; ?></td>
											<td><?php echo $eqrow['emp_name']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											<td><?php echo $eqrow['bonus']; ?></td>
											<td><?php echo $eqrow['total_salary']; ?></td>
											<td><?php echo $eqrow['adv_paid']; ?></td>
											<td><?php echo $eqrow['full_paid']; ?></td>
											<td><?php echo $GTotalPaid; ?></td>
											<td><?php echo $eqrow['recent_due']; ?></td> 
											<td class="text-primary"><?php echo $eqrow['comment']; ?></td>
	<!--	
		<td><a class="btn btn-default" href="view-salary?view=<?php echo $eqrow['id']; ?>" title="click for View" ><span class="glyphicon glyphicon-eye-open"></span> View</a>
				
		 		<a  class="btn btn-default" href="print-salary?print=<?php echo $eqrow['id']; ?>" title="click for Print"><span class="glyphicon glyphicon-print"></span> Print</a> 
		 </td> -->
            		
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