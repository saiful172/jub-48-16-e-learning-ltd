<?php require_once 'header.php'; ?>
<?php 
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$StudentNo = $_POST['StudentNo'];
		$BatchNo = $_POST['BatchNo'];
		$CourseName = $_POST['CourseName'];
		$StudentName = $_POST['StudentName']; 
		$Gender = $_POST['Gender'];
		$BldGrp = $_POST['BldGrp'];
		$FatherName = $_POST['FatherName'];
		$MotherName = $_POST['MotherName'];
		
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($StudentNo)){
			$errMSG = "Please Enter StudentNo.";
		}
		else if(empty($StudentName)){
			$errMSG = "Please Enter StudentName.";
		}
		
		else if(empty($BatchNo)){
			$errMSG = "Please Enter Batch No.";
		}
		 
		
				
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO apply (user_id,student_no,batch_no,course_name,student_name,gender,bld_grp,father_name,mother_name)
			                                         VALUES(:UserId,:StudentNo,:BatchNo,:CourseName,:StudentName, :Gender,:BldGrp,:FatherName,:MotherName)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':StudentNo',$StudentNo);
			$stmt->bindParam(':BatchNo',$BatchNo);
			$stmt->bindParam(':CourseName',$CourseName);
			$stmt->bindParam(':StudentName',$StudentName); 
			$stmt->bindParam(':Gender',$Gender);
			$stmt->bindParam(':BldGrp',$BldGrp);
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
 

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

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

<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
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
	         <?php	//  একই সাথে  Order Due এ ডাটা পাঠানোর জন্য //
				   
				   $pq=mysqli_query($con,"select MAX(student_id)+1 as max_id from students ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
        <input class="form-control" type="hidden" name="StudentId"  value="<?php echo $pqrow['max_id']; ?>"  /> 
      <?php }?>
	  
	</tr>
	
	<tr>
    	<td><label class="control-label">Batch </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="BatchNo" name="BatchNo" required="" >
		<option value="#">Select Batch</option>
		
				      	<?php 
				      	$sql = "SELECT id,batch_name FROM batch where  user_id='".$_SESSION['id']."'";
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
				      	$sql = "SELECT product_id,product_name FROM product where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	<tr>
	<td><label class="control-label">Student No </label></td>
	         <?php	// Auto Customer No
				  
				   $pq=mysqli_query($con,"select MAX(student_no)+1 as max_id from students  where user_id='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
      <td>   
      <input class="form-control" type="text" name="StudentNo"  value="<?php echo $pqrow['max_id']; ?>"  />  </td>
      <?php }?>
	  
	</tr>
	
		
	<tr>
    	<td><label class="control-label">Student Name </label></td>
        <td><input class="form-control" type="text" name="StudentName" placeholder="Student Name" /></td>
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
    	<td><label class="control-label">Blood Group </label></td>
		<td>
		<select style="width:100%;" class="form-control" name="BldGrp" >
		<option value="">Select </option> 
		<option value="A+">A+ </option> 
		<option value="O+">O+ </option>
		<option value="B+">B+ </option>
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




