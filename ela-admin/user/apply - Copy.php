

 
<?php require_once 'header.php'; ?>
 
<?php 
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];		
		$BatchNo = $_POST['BatchNo'];
		$CourseName = $_POST['CourseName'];
		$StudentName = $_POST['StudentName']; 
		$StudentPhn = $_POST['StudentPhn']; 
		$Gender = $_POST['Gender'];
		
		$FatherName = $_POST['FatherName'];
		$MotherName = $_POST['MotherName'];
		
		
		
		
		if(empty($StudentName)){
			$errMSG = "Please Enter Student Name.";
		}
			
		 
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO apply (user_id,batch,course,stu_name,stu_phn,gender,father,mother)
			                                         VALUES(:UserId,BatchNo,:CourseName,:StudentName,:StudentPhn, :Gender,:FatherName,:MotherName)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':BatchNo',$BatchNo);
			$stmt->bindParam(':CourseName',$CourseName);
			$stmt->bindParam(':StudentName',$StudentName); 
			$stmt->bindParam(':StudentPhn',$StudentPhn); 
			$stmt->bindParam(':Gender',$Gender);
			
			
			
			$stmt->bindParam(':FatherName',$FatherName);
			$stmt->bindParam(':MotherName',$MotherName);
			
			
			
			if($stmt->execute()) {
			?>
         <script>
				alert('Student Data Successfully Add ...');
				window.location.href='apply.php';
				</script>
          <?php			
		
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	 
	}
?>
 
   
<div class="container"> 
<center><h4><ol class="breadcrumb"> <li class="active">   New Student </li></ol></h4></center>


    	<h1 class="h2"><a class="btn btn-default" href="students_add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Student</a> 
		<a class="btn btn-default" href="students.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Student </a></h1>
  

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal1" >
	    
	<table class="table table-hover table-responsive">
	
	<tr>
    	
		<?php
				
				   
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
    
	
	<tr>
    	<td><label class="control-label">Batch </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="BatchNo" name="BatchNo" required="" >
		<option value="#">Select Batch</option>
		
				      	<?php 
				      	$sql = "SELECT id,batch_name FROM batch   ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Course Name </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="CourseName" name="CourseName" required="" >
		<option value="#">Select Course</option>
		
				      	<?php 
				      	$sql = "SELECT product_id,product_name FROM product   ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	
	
		
	<tr>
    	<td><label class="control-label">Student Name </label></td>
        <td><input class="form-control" type="text" name="StudentName" placeholder="Student Name" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Student Contact </label></td>
        <td><input class="form-control" type="text" name="StudentPhn" placeholder="Student Contact" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
		<td>
		<select style="width:100%;" class="form-control" name="Gender" >
		<option value="Male">Male </option> 
		<option value="Female">Female </option>
		<option value="Other">Other </option>
		</select>
		</td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Father Name </label></td>
        <td><input class="form-control" type="text" name="FatherName" placeholder="Father Name" /></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Mother Name </label></td>
        <td><input class="form-control" type="text" name="MotherName" placeholder="Mother Name" /></td>
    </tr> 
	

	
	<tr> <td></td>  <td></td></tr>
     
    </table>
    
	<button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp;Save
        </button>
</form>

</div>

<?php include('../includes/footer.php');?>




