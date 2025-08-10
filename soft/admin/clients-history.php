<?php require_once 'header.php'; ?> 
<?php
 
	if(isset($_GET['delete_id']))
	{
		
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM stuff_details WHERE id =:uid');
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
<link rel="stylesheet" href="css/table_data_center.css">


</head>

<body>


<center><h3><ol class="breadcrumb"> <li class="active">Client Activity / History</li></ol></h3></center>
<table width="100%" class="table table-bordered table-hover" group_id="dataTables-example">
                        
			<thead>
                              <th> SL</th>                               
                              <th> Date</th>                               
							   <th>Id</th>
                                <th>Name </th>
                                <th>Business Name </th>
								<th>M.S.C/Taka</th>
								<th>Address</th>
								<th>Status</th>
								<th>Software Status</th>
								<th>Comments</th>
								<th> Expire Date</th> 
							<!--	<th>Action</th>  -->
                            </tr>
            </thead>
                        <tbody>
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from stuff_details  
								left join `stuff` on stuff.userid=stuff_details.userid 							
								left join `user` on user.userid=stuff_details.userid 							
								left join `status` on status.status=stuff_details.status 							
                                left join `software_type` on software_type.software_status=stuff_details.software_status
								ORDER BY stuff_details.id DESC  ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										<td><?php echo ++$sl; ?> </td>
								 <td><?php echo date("M d, Y", strtotime($eqrow['entry_date'])); ?></td>
									<td><?php echo $eqrow['userid']; ?> </td>
									<td><?php echo $eqrow['own_name']; ?> </td>
									<td><?php echo $eqrow['business_name']; ?> </td>
									<td><?php echo $eqrow['service_charge']; ?></td>
									<td><?php echo $eqrow['business_address']; ?></td>
									<td><?php echo $eqrow['type']; ?></td>
									<td><?php echo $eqrow['software_type']; ?></td>
									<td><?php echo $eqrow['comments']; ?></td>
									<td><?php echo $eqrow['expire_date']; ?></td>
											
											
				
			<!--	<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td> -->
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>

<?php require_once '../includes/footer.php'; ?>


