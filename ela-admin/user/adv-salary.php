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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active">Employee's Advanced Salary </li></ol></h4></center>
    
 
<div class="col-md-2">
<div class="buttons"> 
		
        <div class="col-md-12">
		<a class="btn btn-primary btn-w100"  href="adv-salary-paid"> <span class="glyphicon glyphicon-edit"></span> Pay Advanced Salary </a> 
		</div>
	
			
		<div class="col-md-12">
		<a class="btn btn-warning btn-w100"  href="employee-salary-details"> <span class="glyphicon glyphicon-th-list"></span> Salary Histories</a>
		</div>
		
		<div class="col-md-12">
	<h3></h3>
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="employee"> <span class="glyphicon glyphicon-list"></span> Employee List </a>
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="employee-salary"> <span class="glyphicon glyphicon-list"></span> Salary List </a>
		</div>
		
	<!--		
		<div class="col-md-2">
		<a class="btn btn-success"  href="dues_report_all.php"> <span class="glyphicon glyphicon-file"></span> All Report </a> 
		</div>

		<div class="col-md-2">
		<a class="btn btn-success"   href="ReportDues.php"> <span class="glyphicon glyphicon-file"></span> Date Wise Report  </a>
		</div>
		-->
		<div class="col-md-12">
		<a class="btn btn-success btn-w100"   href="EmpSalSingleReport.php"> <span class="glyphicon glyphicon-file"></span> Single Report</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100"   href="emp_sal_rpt_monthly.php"> <span class="glyphicon glyphicon-file"></span> Monthly Report</a> 
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
                                <th>Name</th> 
								<th>Position</th>
                                <th>Year </th>
                                <th>Month</th>
								<th> Salary</th>
								<th> Bonus</th>
								<th> Salary + Bonus</th>
								<th> Advance </th>
								<th>Paid Salary  </th>
								<th> Total Paid Salary  </th>
								<th> Due</th>
                            </tr>
							
                        </thead>
                         <tbody id="tbody">

	
	
	<?php
	$eq=mysqli_query($con,"select * from employees_salary_details  
	Left JOIN employees ON employees.id = employees_salary_details.emp_id
	where employees_salary_details.user_id='".$_SESSION['id']."' and employees_salary_details.sal_type=4 ORDER BY employees_salary_details.id DESC  ");
	
	$GTotalPaid= "";
	while($eqrow=mysqli_fetch_array($eq)){
	$GTotalPaid=$eqrow['adv_paid'] + $eqrow['full_paid'] ;
	
	?>
			<tr>
			<td><?php echo date("M d,Y", strtotime($eqrow['last_update'])); ?></td>
			
			<td><?php echo $eqrow['id']; ?></td> 
											<td><?php echo $eqrow['emp_name']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
			<td><?php echo $eqrow['year']; ?></td>
			<td><?php echo $eqrow['month']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											<td><?php echo $eqrow['bonus']; ?></td>
											<td><?php echo $eqrow['total_salary']; ?></td>
											<td><?php echo $eqrow['adv_paid']; ?></td>
											<td><?php echo $eqrow['full_paid']; ?></td>
											<td><?php echo $GTotalPaid; ?></td>
											<td><?php echo $eqrow['recent_due']; ?></td>
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



<?php require_once '../includes/footer.php'; ?>
</div>	





</div>


<!-- Latest compiled and minified JavaScript -->



</body>
</html>