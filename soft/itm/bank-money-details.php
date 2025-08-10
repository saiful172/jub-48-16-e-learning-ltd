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
 <link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css"> 
</head>

<body>
<center><h4><ol class="breadcrumb"> <li class="active"> Bank Transaction History </li></ol></h4></center>
 
<?php require_once 'more-fals/bank-option-link.php'; ?>    
<div class="col-md-2">
<a class="btn btn-primary"  href="bank_money_add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Account </a>
</div>  
<?php require_once 'more-fals/search-box.php'; ?>   
		
<table width="100%" class="table  table-responsive table-bordered table-hover" id="dataTables-example">
                   <thead>
				
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
								<th>Previous</th>
								<th>Deposit</th>
								<th>Withdraw</th>
								<th>Present</th>
								<th>Purpose</th>
								<th>Reference</th>
								<th>Date</th>
							</tr>
							
                        </thead>
                        <tbody>

	
	
	<?php
	$sl=0;
	$eq=mysqli_query($con,"select * from bank_money_history 
	Left JOIN bank_name ON bank_name.id = bank_money_history.bank_id
	where bank_money_history.user_id='".$_SESSION['id']."' ORDER BY bank_money_history.id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo $eqrow['name']; ?>  </td>
			<td><?php echo $eqrow['previous_amt']; ?>  </td>
			<td><?php echo $eqrow['money_in']; ?>  </td>
			<td><?php echo $eqrow['money_out']; ?>  </td>
			<td><?php echo $eqrow['recent_amt']; ?>  </td>
			<td><?php echo $eqrow['cuses']; ?>  </td>
			<td><?php echo $eqrow['refer']; ?>  </td>
			<td><?php echo $eqrow['entry_date']; ?>  </td>
			
          </tr>				
<?php
}
?>

</tbody>
</table>


<?php require_once '../includes/footer.php'; ?>
