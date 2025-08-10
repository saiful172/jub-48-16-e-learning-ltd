<?php require_once 'header.php'; ?>
<?php
 
	
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM daily_notes WHERE id =:uid');
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


<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>

<center><h4><ol class="breadcrumb"> <li class="active"> Today's Reminder - Daily Notes  </li></ol></h4></center>	
 
    	<div class="col-md-2">
		
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="notes-add"> <span class="glyphicon glyphicon-plus"></span> &nbsp;  Add New  </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="notes"> <span class="glyphicon glyphicon-step-backward"></span>  Notes </a> 
		</div>
		
		<div class="col-md-12">
		<a href="note-report-by-date"> <button class="btn btn-success btn-w100" ><span class="glyphicon glyphicon-print"></span>  Date Wise View</button> </a>
		</div>
		</div>
		
		<div class="col-md-10">
			  <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search.....">
			  </div>
    


<table width="100%" class="table table-bordered table-hover table-responsive" group_id="dataTables-example">
                        <thead>
                        <tr>
                                
							
							<th>SL</th>
							<th>Entry Date</th>
							<th>Title</th> 
							<th>Details</th> 
							<th>Remind Date</th>
							<th>Update</th> 
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							date_default_timezone_set("Asia/Dhaka");
                            $Date=date("Y/m/d");
							$sl=0;
								$eq=mysqli_query($con,"select * from daily_notes where alarm_date='$Date' and user_id='".$_SESSION['id']."'  ORDER BY id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										   
											
											<td><?php echo ++$sl; ?></td>
											<td><?php echo date("M d,Y", strtotime($eqrow['entry_date'])); ?></td>
											<td> <?php echo $eqrow['note_title']; ?> </td> 
											<td> <?php echo $eqrow['note_details']; ?> </td> 
											<td><?php echo date("M d,Y", strtotime($eqrow['alarm_date'])); ?></td>
											
											
				<td><a  class="btn btn-info" href="notes-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" 
                 onclick="return confirm('Do you want to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>  
				   ||  
				 <a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do you want to edit ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
 

<?php include('../includes/footer.php');?>

