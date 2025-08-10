
<?php require_once 'header.php'; ?>

<?php 
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM bank_name WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/table_data_center.css">
<link rel="stylesheet" href="css/buttons.css">
</head>

<body>



<center><h4><ol class="breadcrumb"> <li class="active">Bank Name</li></ol></h4></center>	
<?php require_once 'more-fals/bank-option-link.php'; ?>
<div class="col-md-2">
<a class="btn btn-primary" href="bank-name-add"> <span class="glyphicon glyphicon-plus"></span> Add New Bank</a>
</div>   
<?php require_once 'more-fals/search-box.php'; ?>  

	<table width="100%" class="table  table-responsive table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr> 
							<th>SL</th>
							<th>Bank Name</th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							    $date=date("Y/m/d");
								$eq=mysqli_query($con,"select * from bank_name   order by id asc ");
								while($eqrow=mysqli_fetch_array($eq)){
									 
									?>
										<tr> 
										
										<td><?php echo ++$sl; ?>  </td>
											<td><?php echo $eqrow['name']; ?></td>
											
											
				<td><a  class="btn btn-info" href="bank-name-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span>Edit</a> </td>
			 
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			 
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
<?php require_once '../includes/footer.php'; ?>

</div>
</div>


