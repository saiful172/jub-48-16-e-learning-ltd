<?php require_once 'header.php'; ?>
<?php
	
	if(isset($_GET['delete_id']))
	{
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM orders_dues WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Salary Histories </li></ol></h4></center>
     
 
<div class="col-md-2"> 
<div class="buttons">
        
		<div class="col-md-12">
		<a class="btn btn-primary  btn-w100" href="employee-salary-create"> <span class="glyphicon glyphicon-pencil"></span> Create Salary</a> 
		</div>
		
        <div class="col-md-12">
		<a class="btn btn-primary  btn-w100" href="employee-salary-paid"> <span class="glyphicon glyphicon-pencil"></span> Pay Salary</a> 
		</div>
	
			
		<div class="col-md-12">
		<a class="btn btn-success  btn-w100" href="employee-salary"> <span class="glyphicon glyphicon-eye-open"></span> View Actual Salary </a> 
		</div>
	  
		</div>
		</div>
		
	<div class="col-md-10">

	<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
         </div>

		<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
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
								<th> Print</th>
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
											<td><?php echo $eqrow['comment']; ?></td>
		 <td>
		 		<a class="btn btn-default" href="sal-view?view=<?php echo $eqrow['id']; ?>" title="click for View" ><span class="glyphicon glyphicon-eye-open"></span> View</a>
				
		 		<a  class="btn btn-default" href="sal-print?print=<?php echo $eqrow['id']; ?>" title="click for Print"><span class="glyphicon glyphicon-print"></span> Print</a> 
		 </td>
            		
          </tr>				
<?php
}
?>

</tbody>
</table>



<?php require_once '../includes/footer.php'; ?>
</div>	

</div>
<!-- Latest compiled and minified JavaScript -->

</body>
</html>