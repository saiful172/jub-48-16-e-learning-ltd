<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM title_name WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
 
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/table_data_center.css">


<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>


<div class="container">

<center><h4><ol class="breadcrumb"> <li class="active">Title Name </li></ol></h4></center>	
	  <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search.....">
			  </div>
			  
		 
    	<h1 class="h2">
		<a class="btn btn-default" href="title_name_add.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp;  Add New   </a> 
		
		</h1> 
    


<table width="100%" class="table table-striped table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                                
							
							<th> Id</th>
							<th> Location</th>
							<th> Name</th>
							
							<th>Edit</th>
							<th>Delete</th>
							
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from title_name  ORDER BY id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										   
											
											 
											<td><?php echo $eqrow['id']; ?></td>
											<td><?php echo $eqrow['location']; ?></td>
											<td><?php echo $eqrow['name']; ?></td>
											 
											
											
				<td><a  class="btn btn-info" href="title_name_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Are you sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

</div>

<?php require_once '../includes/footer.php'; ?>


