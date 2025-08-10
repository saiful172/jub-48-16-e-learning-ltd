<link rel="stylesheet" href="css/table_data_center.css">
<center><h3><ol class="breadcrumb"> <li class="active">Student List </li></ol></h3></center>

<table width="100%" class="table table-hover" student_id="dataTables-example">
                        <thead>
                            
                            <tr>
								 
                                <th>SL</th> 
                                <th>Session</th>
                                <th>Batch</th> 
                                <th>Name</th>  
								<th>Father</th>
								<th>Mother</th> 
								
                                <th>Photo</th> 
                                <th>Portfolio</th> 
								
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
											 
											<td><?php echo $eqrow['session']; ?></td>
											<td><?php echo $eqrow['batch']; ?></td>
											
											<td><?php echo $eqrow['stu_name']; ?></td>  
											<td><?php echo $eqrow['father_name']; ?></td>
											<td><?php echo $eqrow['father_name']; ?></td> 
											 											
										 <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
			 <td><a  class="btn btn-primary" href="student-list-view.php?edit_id=<?php echo $eqrow['student_id']; ?>" title="Click To View" ><span class="glyphicon glyphicon-user"></span> More Info</a> </td>
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>