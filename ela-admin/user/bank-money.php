<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_GET['delete_id']))
	{	
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM bank_money WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
			}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/table_data_center.css"> <!-- table_data_center-->
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active"> Main Accounts And Transactions </li></ol></h4></center>
 
<?php require_once 'more-fals/bank-option-link.php'; ?>  
<div class="col-md-2">
<a class="btn btn-primary"  href="bank-money-add"> <span class="glyphicon glyphicon-plus"></span> Add New Account </a>
</div>  
<?php require_once 'more-fals/search-box.php'; ?>   

			<table width="100%" class="table table-bordered table-responsive table-hover" id="dataTables-example">
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
		
			<td><a class="btn btn-info" href="bank-money-edit?edit_id=<?php echo $eqrow['bank_id']; ?>" title="click for edit" onclick="return confirm('Do You Want Edit?')"><span class="glyphicon glyphicon-edit"></span> Edit</a></td> 
	   <!--		<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
		-->			
          </tr>				
<?php
}
?>

</tbody>
</table>


<?php require_once '../includes/footer.php'; ?>
