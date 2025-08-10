<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM student_list WHERE student_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM student_list WHERE student_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>
</head>

<body>
<div class="container-fluid"> 
<center><h4><ol class="breadcrumb"> <li class="active">Student List </li></ol></h4></center>

	
	<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search </span>
				 <input id="myInput" style="width:100%; type="text"  class="form-control" placeholder="Search..">
	</div>


	<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="student-list-add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Student </a> 
		</div>
		
		
		
		</div>
    
<table width="100%" class="table table-bordered table-hover" student_id="dataTables-example">
                        <thead>
                            
                            <tr>
								 
                                <th>SL</th>
                                
                                <th>District</th>
                                <th>Session</th>
                                <th>Batch</th>
								
                                <th>Name</th>
                                <th>Gender</th>
								<th>Father Name</th>
								<th>Mother Name</th>
								<th>Age</th>
								<th>Phone</th>
								<th>E-mail</th>
								
								<th>NID/Birth Certificate</th>
								<th>Blood Group</th>
								<th>Have Computer</th>
								<th>Profession</th>
								<th>Religion</th>
								<th>Disabilities</th>
								
								<th>Address</th>
								<th>Permanent Address</th>
								<th>Last Academic Qualification</th>
								<th>Passing Year</th>
								<th>LinkedIn </th>
								<th>Upwork</th>
								<th>Fiverr</th>
								<th>Freelancing Link 3</th>
								<th>Freelancing Link 4</th>
														
								
                                <th>Photo</th>
								
								<th>Edit</th>
								<th>Delete</th>
                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from student_list  ORDER BY student_id DESC limit 300 ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['user_id'];
									?>
										<tr>
											 
											<td><?php echo ++$sl; ?></td>
											
											<td><?php echo $eqrow['district']; ?></td>
											<td><?php echo $eqrow['session']; ?></td>
											<td><?php echo $eqrow['batch']; ?></td>
											
											<td><?php echo $eqrow['stu_name']; ?></td>
											<td><?php echo $eqrow['gender']; ?></td>
											<td> <?php echo $eqrow['father_name']; ?> </td>
											<td><?php echo $eqrow['mother_name']; ?></td>
											<td><?php echo $eqrow['age']; ?></td>
											<td><?php echo $eqrow['contact']; ?></td>
											<td><?php echo $eqrow['email']; ?></td>
											
											<td><?php echo $eqrow['nid_no']; ?></td>
											<td><?php echo $eqrow['blood_grp']; ?></td>
											<td><?php echo $eqrow['computer']; ?></td>
											<td><?php echo $eqrow['profession']; ?></td>
											<td><?php echo $eqrow['religion']; ?></td>
											<td><?php echo $eqrow['disabilities']; ?></td>
											
											<td><?php echo $eqrow['address']; ?></td>
											<td><?php echo $eqrow['perma_address']; ?></td>
											<td><?php echo $eqrow['edu_qual']; ?></td>
											<td><?php echo $eqrow['pass_year']; ?></td>
											<td><?php echo $eqrow['linked_in']; ?></td>
											<td><?php echo $eqrow['upwork']; ?></td>
											<td><?php echo $eqrow['fiver']; ?></td>
											<td><?php echo $eqrow['link_three']; ?></td>
											<td><?php echo $eqrow['link_four']; ?></td>											
											
											
										 <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
			
				<td><a  class="btn btn-info" href="student-list-edit.php?edit_id=<?php echo $eqrow['student_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
		   <td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['student_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
</div>



</body>
</html>