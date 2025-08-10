<?php require_once 'header.php'; ?>

<?php
  
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM phnbook_category WHERE pb_cat_id=:uid');
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



<center><h4><ol class="breadcrumb"> <li class="active">Leads Category  </li></ol></h4></center>	
 
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads-cat-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-success btn-w100" target="_blank" href="php_action/leads-cat-print"> <span class="glyphicon glyphicon-file"></span> Print Cat List</a> 
</div>

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads"> <span class="glyphicon glyphicon-user"></span> Leads</a>
</div>
 

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="follow"> <span class="glyphicon glyphicon-user"></span> Follow Up</a>
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
							  							
							<th>Edit -|- Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							  $sl=0;
								$eq=mysqli_query($con,"select * from phnbook_category
								where user_id='".$_SESSION['id']."'
								ORDER BY pb_cat_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['pb_cat_name']; ?></td>
											 
											
				<td><a  class="btn btn-info" href="leads-cat-edit.php?edit_id=<?php echo $eqrow['pb_cat_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>   -|- 
				
				 <a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['pb_cat_id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
 

<?php include('../includes/footer.php');?>
