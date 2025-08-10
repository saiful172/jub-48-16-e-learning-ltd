<?php require_once 'header.php'; ?>
<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$student_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM student_list WHERE student_id =:uid');
		$stmt_edit->execute(array(':uid'=>$student_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
	 
		$Dob = $_POST['Dob'];
		$Age = $_POST['Age'];
	 
		 
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE student_list 
									     SET 
										 
										     birth_date=:Dob, 
										     age=:Age  
											 
								       WHERE student_id=:uid');

			 
			$stmt->bindParam(':Dob',$Dob);
			$stmt->bindParam(':Age',$Age);
	 
			
			 
			$stmt->bindParam(':uid',$student_id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successfully Done...');
				window.location.href='student-list.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container"> 
<center><h3><ol class="breadcrumb"> <li class="active">Student Update</li></ol></h3></center>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-hover table-responsive">
	 
	<tr>
    	<td><label class="control-label">Select Session </label></td>
        <td><Select class="form-control" type="text" name="Session"  >
		<option value="<?php echo $session; ?>" ><?php echo $session; ?> </option> 
		<option value="1">Session-01 (March-May-2023) </option>
		<option value="2">Session-02 (June-August-2023) </option>
		</Select></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select  Batch </label></td>
        <td><Select class="form-control" type="text" name="Batch"  >
		<option value="<?php echo $batch; ?>"><?php echo $batch; ?></option>
		<option value="1">Batch-1</option>
		<option value="2">Batch-2</option> 
		</Select>
		</td>
    </tr>
		
	
	<tr>
    	<td><label class="control-label">Student Name</label></td>
        <td><input class="form-control" type="text" name="StuName" value="<?php echo $stu_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
        <td><Select class="form-control" type="text" name="Gender"  >
		<option><?php echo $gender; ?></option>
		<option>Male</option>
		<option>Female</option>
		<option>Prefer Not To Say</option>
		</Select>
		</td> 
    </tr>
	
	<tr>
    <td><label class="control-label">Father Name</label></td>
		<td><input style="width:100%;" class="form-control" name="FatherName" value="<?php echo $father_name; ?>" > </td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Mother Name</label></td>
        <td><input class="form-control" type="text" name="MotherName" value="<?php echo $mother_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date Of Birth </label></td>
		 <td><input class="form-control" type="text" name="BBDD" value="<?php echo $birth_date; ?>" />
		 <input class="form-control" type="date" name="Dob"   required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Age</label></td>
        <td><input class="form-control" type="text" name="Age" value="<?php echo $age; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Contact</label></td>
        <td><input class="form-control" type="text" name="Contact"  value="<?php echo $contact; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-mail </label></td>
        <td><input class="form-control" type="text" name="Email" value="<?php echo $email; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">NID/Birth Certificate No</label></td>
        <td><input class="form-control" type="text" name="NidNo" value="<?php echo $nid_no; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Blood Group </label></td>
        <td><input class="form-control" type="text" name="BloodGrp" value="<?php echo $blood_grp; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Have a Computer </label></td>
        <td><Select class="form-control" type="text" name="Computer"  >
		<option value="<?php echo $disabilities; ?>"><?php echo $computer; ?></option>
		<option>Yes</option>
		<option>No</option> 
		</Select>
		</td> 
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Profession</label></td>
        <td><input class="form-control" type="text" name="Profession" value="<?php echo $email; ?>"  /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Religion </label></td>
        <td><Select class="form-control" type="text" name="Religion" required >
		<option value="<?php echo $religion; ?>"><?php echo $religion; ?></option>
		<option>Islam</option>
		<option>Hindu </option>
		<option>Others</option>
		<option>Others</option>
		</Select>
		</td> 
    </tr>
	 
	 
	
	
	<tr>
    	<td><label class="control-label">Disabilities </label></td>
        <td><Select class="form-control" type="text" name="Computer"  >
		<option value="<?php echo $disabilities; ?>"><?php echo $disabilities; ?></option>
		<option>Yes</option>
		<option>No</option> 
		</Select>
		</td> 
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Address </label></td>
        <td><input class="form-control" type="text" name="Address" value="<?php echo $address; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Permanent Address </label></td>
        <td><input class="form-control" type="text" name="PermaAddress" value="<?php echo $perma_address; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Last Academic Qualification </label></td>
        <td><input class="form-control" type="text" name="EduQual" value="<?php echo $edu_qual; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Passing Year </label></td>
        <td><input class="form-control" type="text" name="PassYear" value="<?php echo $pass_year; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">LinedIn </label></td>
        <td><input class="form-control" type="text" name="LinedIn" value="<?php echo $linked_in; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Upwork </label></td>
        <td><input class="form-control" type="text" name="Upwork" value="<?php echo $upwork; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Fiverr </label></td>
        <td><input class="form-control" type="text" name="Fiverr" value="<?php echo $fiver; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 3 </label></td>
        <td><input class="form-control" type="text" name="LinkThree" value="<?php echo $link_three; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 4 </label></td>
        <td><input class="form-control" type="text" name="LinkFour" value="<?php echo $link_four; ?>" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Active/In-Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In-Active</option>
		</select> </td>       
	</tr>
	 
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
     
	 <tr><td></td><td></td> </tr>
    
    </table>
	
	 <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update 
        </button>
        
        <a class="btn btn-danger" href="customer.php"> <span class="glyphicon glyphicon-backward"></span> Cancel</a>
        
        </td>
    </tr>
    
</form>

</div>
<?php include('includes/footer.php');?>