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
     <h1>Students Payment Details |  <span> <a href="stu-dues-pay">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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
							<th colspan="1"> Last </th>
							<th colspan="1"> Invoice </th>
							<th colspan="3"> Customer </th>
							<th colspan="5"> Amount</th>
							<th colspan="1"> Paid </th>
							</tr>
							<tr>
                                
                                 
                                <th>Date  </th>
								
								<th>No</th>
								
                                <th>Id</th>
                                <th>Name</th>
								<th>Phone</th>
								
								<th>Previous Dues</th>
								<th> Today</th>
								<th>Total</th>
								<th>Paid</th>
								<th>Recent Dues</th>
								<th>Subject</th>
								
                            </tr>
                        </thead>
						
						
                         <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from orders_details 
    Left JOIN students ON students.student_id = orders_details.student_id
	where orders_details.user_id='".$_SESSION['id']."' ORDER BY orders_details.id DESC Limit 100 ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			<td><?php echo date("M d,Y", strtotime($eqrow['order_date'])); ?></td>
			<td><?php echo $eqrow['order_id']; ?>  </td>
			
			<td><?php echo $eqrow['student_id']; ?>  </td>
			<td><?php echo $eqrow['student_name']; ?>  </td> 
			<td><?php echo $eqrow['student_phone']; ?>  </td> 
			
			
			<td><?php echo $eqrow['pre_due']; ?></td>
			<td><?php echo $eqrow['today_total']; ?></td>
			<td><?php echo $eqrow['grand_total']; ?></td>
			<td><?php echo $eqrow['paid']; ?></td>
			<td><?php echo $eqrow['recent_due']; ?>  </td>
			<td><?php echo $eqrow['causes']; ?>  </td>
		<!--	<td>
		 		<a class="btn btn-info" href="dues_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>  
			</td>
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