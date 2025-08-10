<?php require_once 'header.php'; ?>
<?php
  
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM office_exp_name WHERE of_id=:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
	 
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="css/table_data_center.css">
<link rel="stylesheet" href="css/buttons.css">
 
</head>

<body> 

<center><h4><ol class="breadcrumb"> <li class="active">Office Expense Name </li></ol></h4></center>	

<div class="col-md-2"> 
	  
	    <div class="buttons"> 
		
		<div class="col-md-12">
		<a class="btn btn-primary  btn-w100" href="exp-name-office-add" > <span class="glyphicon glyphicon-plus"></span>   Add New  </a> 
		</div> 
		
		<div class="col-md-12">
		<a class="btn btn-danger btn-w100" href="Expense" > <span class="glyphicon glyphicon-backward"></span> Back To  Expense  </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" target="_blank" href="php_action/print-expense-category"> <span class="glyphicon glyphicon-print"></span> Print  </a> 
		</div> 
		
		</div>    
</div>

<div class="col-md-10">

<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div> 


<table width="100%" class="table table-bordered table-responsive table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                                
							
							<th>SL</th>
							<th>Name</th>
							 
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							  $sl=0;
								$eq=mysqli_query($con,"select * from office_exp_name
								where user_id='".$_SESSION['id']."'
								ORDER BY of_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['name']; ?></td>
											 
											
				<td><a  class="btn btn-info" href="exp-name-office-edit?edit_id=<?php echo $eqrow['of_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['of_id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>



<?php include('../includes/footer.php');?>
