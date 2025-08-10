<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM customer_msg WHERE id =:uid');
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
<title>Customer Meassage</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/table_data_center.css">

<script>
function myFunctionPrint() {
	window.open("group_active_view.php");
	}
</script>
</head>

<body>


<center><h3><ol class="breadcrumb"> <li class="active"> Customer Message (In Active)</li></ol></h3></center>
	
	
    	<h1 class="h2">
		<a class="btn btn-default" href="customer_msg_add.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Add New Msg </a> 
		<a class="btn btn-default" href="customer_msg.php"> <span class="glyphicon glyphicon-share-alt"></span> &nbsp; Go Back </a> 
		<span class="pull-right"><button class="btn btn-success btn-sm" onclick="myFunctionPrint()"><span class="glyphicon glyphicon-print"></span> Print</button> </span>
		</h1> 


     <table width="100%" class="table table-striped table-bordered table-hover" group_id="dataTables-example">
                        
			<thead>
                <tr> 
					 <th>Date</th> 
					 <th>Message From</th> 
					 <th>Message To</th>  
					 <th>User Id</th>  
                     <th>Message Name</th>
					 <th>Link</th> 
					 <th>Edit</th>
					 <th>Delete</th>
                 </tr>
            </thead>
                        <tbody>
							<?php
								$eq=mysqli_query($con,"select * from customer_msg 
								where customer_msg.status=0 ORDER BY customer_msg.id DESC LIMIT 100 ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr>
										    <td><?php echo $eqrow['entry_date']; ?></td>
											<td><?php echo $eqrow['msg_from']; ?></td>  
											<td><?php echo $eqrow['msg_to']; ?></td>  
										    <td><?php echo $eqrow['user_id']; ?></td>
											<td><?php echo $eqrow['msg_name']; ?></td>
											<td><?php echo $eqrow['link']; ?></td>
											
				<td><a  class="btn btn-info" href="customer_msg_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

<?php require_once '../includes/footer.php'; ?>


