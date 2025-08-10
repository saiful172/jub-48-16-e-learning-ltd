<?php require_once 'header.php'; ?>
<?php
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM expense WHERE id =:uid');
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
 
<center><h4><ol class="breadcrumb"> <li class="active"> Office Expenses Entry </li></ol></h4></center>	
 
    
<div class="col-md-2">  
<div class="buttons"> 

		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="Expense-Add"  > <span class="glyphicon glyphicon-plus"></span> Add New   </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="exp-name-office"  > <span class="glyphicon glyphicon-list-alt"></span>  Category   </a> 
		 </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="exp-report-by-date"  > <span class="glyphicon glyphicon-file"></span> Report By Date </a>
	   </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="office-exp-report-by-heading"  > <span class="glyphicon glyphicon-file"></span> Report By Category </a> 
		 
		</div>
		
		<div class="col-md-12">
		</div> 
		
	</div>
	
	 
</div>

<div class="col-md-10"> 

<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div> 

<table width="100%" class="table  table-bordered table-responsive table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                                
							
							<th>SL</th>
							<th>Name</th>
							<th>Details</th>
							<th>Qty</th>
							<th>Taka</th>
							<th>Reference </th>
							<th> Date</th>
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from expense

                              left join office_exp_name on office_exp_name.of_id=expense.expense_name
							  where expense.user_id='".$_SESSION['id']."' ORDER BY expense.id DESC limit 300");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td> 
											<td><?php echo $eqrow['name']; ?></td>
											<td><?php echo $eqrow['exp_details']; ?></td>
											<td><?php echo $eqrow['ammount']; ?></td>
											<td><?php echo $eqrow['expense_cost']; ?></td>
											<td><?php echo $eqrow['reference']; ?></td>
											<td><?php echo date("M d,Y", strtotime($eqrow['entry_date'])); ?></td>
											
											
				<td><a  class="btn btn-info" href="Expense-Edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>


<?php include('../includes/footer.php');?>

