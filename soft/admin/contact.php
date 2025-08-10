<?php require_once 'header.php'; ?> 
<?php
  
	if(isset($_GET['delete_id']))
	{ 
		$stmt_delete = $DB_con->prepare('DELETE FROM contact_info WHERE id=:uid');
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
 
<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>



<center><h4><ol class="breadcrumb"> <li class="active">Free Trial</li></ol></h4></center>	

<div class="container-fluid"> 	  
  
<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search:</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search.....">
</div>  
    


<table width="100%" class="table table-bordered table-responsive table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
							<th>SL</th>
							<th>Date</th>
							<th>Name</th> 
							<th>Phone </th> 
							<th>Email</th>
							<th>Address</th>
							<th>Message</th>
							 
							<th>Edit</th>
							
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							  $sl=0;
								$eq=mysqli_query($con,"select * from contact_info 
								ORDER BY id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo date("M-d-Y h:i:sa", strtotime($eqrow['entry_date'])); ?></td> 
											<td><?php echo $eqrow['name']; ?></td> 
											<td><?php echo $eqrow['phone']; ?></td>
											<td><?php echo $eqrow['email']; ?></td> 
											<td><?php echo $eqrow['address']; ?></td> 
											<td><?php echo $eqrow['message']; ?></td> 
											 
											
				<td><a  class="btn btn-info" href="option-status-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do you want to Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

</div>

<?php include('../includes/footer.php');?>
