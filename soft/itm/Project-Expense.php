<?php require_once 'header.php'; ?>
<?php
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM prjct_expense WHERE prj_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		 
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/table_data_center.css"> 
<link rel="stylesheet" href="css/buttons.css">  
</head>

<body>
 
<center><h4><ol class="breadcrumb"> <li class="active"> Project Expenses Entry </li></ol></h4></center>	
 <?php require_once 'more-fals/project-link-btn.php'; ?> 

<div class="col-md-2">
<a class="btn btn-warning text-black" href="Project-Expense-Add"  > <span class="glyphicon glyphicon-plus"></span> Add New Expenses  </a> 
</div> 

<?php require_once 'more-fals/search-box.php'; ?> 

<table width="100%" class="table  table-bordered table-responsive table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                                
							
							<th>SL</th>
							<th>Name</th>
							<th>Category</th>
							<th>Details</th>
							<th>Qty</th>
							<th>KG</th>
							<th>Ref. </th>
							<th> Date</th>
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from prjct_expense

                              left join project_exp_cat on project_exp_cat.of_id=prjct_expense.exp_cat
                              left join prjct_name on prjct_name.pj_id=prjct_expense.prj_name
							  where prjct_expense.user_id='".$_SESSION['id']."' ORDER BY prjct_expense.prj_id DESC limit 300");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td> 
											<td><?php echo $eqrow['pj_name']; ?></td>
											<td><?php echo $eqrow['name']; ?></td>
											<td><?php echo $eqrow['prj_details']; ?></td>
											<td><?php echo $eqrow['qty']; ?></td>
											<td><?php echo $eqrow['kg']; ?></td>
											<td><?php echo $eqrow['reference']; ?></td>
											<td><?php echo date("M d,Y", strtotime($eqrow['entry_date'])); ?></td>
											
											
				<td><a  class="btn btn-info" href="Project-Expense-Edit?edit_id=<?php echo $eqrow['prj_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['prj_id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>


<?php include('../includes/footer.php');?>

