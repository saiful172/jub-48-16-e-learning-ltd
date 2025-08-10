<?php require_once 'header.php'; ?>
<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM p_cost_item WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Group Panel</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<style type="text/css">
th{text-align:center;}
td{text-align:center;}
</style>

<script>
function myFunctionPrint() {
	window.open("p_cost_item_report.php");
	}
</script>
</head>

<body>


<div class="container">
<center><h3>Product Cost Item </h3></center>
	<div class="page-header">
	
    	<h1 class="h2"><a class="btn btn-default" href="p_cost_item_add.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; P_cost Item Add </a> 
		<span class="pull-right"><button class="btn btn-success btn-sm" onclick="myFunctionPrint()"><span class="glyphicon glyphicon-print"></span> Print</button> </span>
		
		</h1> 
    </div>
    

<div class="row">
<table width="100%" class="table table-striped table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                            <tr>
                                
								
								<th>Item Name</th>
								<th>Edit</th>
								<th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$eq=mysqli_query($con,"select * from p_cost_item ORDER BY id DESC LIMIT 15 ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										   
											<td><?php echo ucwords($eqrow['item_name']); ?></td>

											
				<td><a  class="btn btn-info" href="p_cost_edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>


<div class="alert alert-info">
   <strong>Powered By </strong> <a target="_blank" href="http://www.itmsofts.com/">ITM-SOFTS | itmsofts.com</a>
</div>

</div>

</div>

<?php require_once 'includes/footer.php'; ?>
<!-- Latest compiled and minified JavaScript -->


</body>
</html>