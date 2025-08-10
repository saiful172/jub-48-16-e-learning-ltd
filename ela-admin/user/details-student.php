<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$student_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM students WHERE student_id =:uid');
		$stmt_edit->execute(array(':uid'=>$student_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	 
	/*if(isset($_POST['btn_save_updates']))
	{
		
		$StudentNo = $_POST['StudentNo'];
		$BatchNo = $_POST['BatchNo'];
		$CourseName = $_POST['CourseName'];
		$StudentName = $_POST['StudentName']; 
		$Gender = $_POST['Gender'];
		$FatherName = $_POST['FatherName'];
		$MotherName = $_POST['MotherName'];
		
		$PreVill = $_POST['PreVill'];
		$PrePost = $_POST['PrePost'];
		$PreUpazila = $_POST['PreUpazila'];
		$PreDistrict = $_POST['PreDistrict'];
		
		$ParVill = $_POST['ParVill'];
		$ParPost = $_POST['ParPost'];
		$ParUpazila = $_POST['ParUpazila'];
		$ParDistrict = $_POST['ParDistrict'];
		
		$MrgInfo = $_POST['MrgInfo'];
		$Religion = $_POST['Religion'];
		$Nation = $_POST['Nation'];
		$BirthDate = $_POST['BirthDate']; 
		$StuPhn = $_POST['StuPhn'];
		$StuEmail = $_POST['StuEmail'];
		$GuarPhn = $_POST['GuarPhn'];
		
		$Degree = $_POST['Degree'];
		$Institute = $_POST['Institute'];
		$BoardRoll = $_POST['BoardRoll'];
		$PasYear = $_POST['PasYear'];
		$Gpa = $_POST['Gpa'];
		$BoardName = $_POST['BoardName'];
		
		$Refer = $_POST['Refer'];
		$Status = $_POST['Status'];
		
		$Date = $_POST['Date'];
			
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
			$stmt = $DB_con->prepare('UPDATE students 
									     SET student_no=:StudentNo, 
										     batch_no=:BatchNo, 
										     course_name=:CourseName, 
										     student_name=:StudentName, 
										     gender=:Gender, 
										     father_name=:FatherName, 
										     mother_name=:MotherName, 
											 
										     pre_vill=:PreVill, 
										     pre_post=:PrePost, 
										     pre_upazila=:PreUpazila, 
										     pre_dist=:PreDistrict, 
											 
										     par_vill=:ParVill, 
										     par_post=:ParPost, 
										     par_upazila=:ParUpazila, 
										     par_dist=:ParDistrict, 
											 
										     marriage_info=:MrgInfo, 
										     religion=:Religion, 
										     nationality=:Nation, 
										     birth_date=:BirthDate, 
										     student_phone=:StuPhn, 
											 
										     student_email=:StuEmail, 
										     guardian_phone=:GuarPhn, 
										     degree=:Degree, 
										     institute_name=:Institute, 
										     board_roll=:BoardRoll, 
										     pass_year=:PasYear, 
										     gpa=:Gpa, 
										     board_name=:BoardName, 
										     reference=:Refer, 
										     join_date=:Date, 
										     
										     status=:Status, 
											 
										     userPic=:upic 
								       WHERE student_id=:uid');
            
			
			$stmt->bindParam(':StudentNo',$StudentNo);
			$stmt->bindParam(':BatchNo',$BatchNo);
			$stmt->bindParam(':CourseName',$CourseName);
			$stmt->bindParam(':StudentName',$StudentName); 
			$stmt->bindParam(':Gender',$Gender);
			$stmt->bindParam(':FatherName',$FatherName);
			$stmt->bindParam(':MotherName',$MotherName);
			
			$stmt->bindParam(':PreVill',$PreVill);
			$stmt->bindParam(':PrePost',$PrePost);
			$stmt->bindParam(':PreUpazila',$PreUpazila);
			$stmt->bindParam(':PreDistrict',$PreDistrict);
			
			$stmt->bindParam(':ParVill',$ParVill);
			$stmt->bindParam(':ParPost',$ParPost);
			$stmt->bindParam(':ParUpazila',$ParUpazila);
			$stmt->bindParam(':ParDistrict',$ParDistrict);
			
			$stmt->bindParam(':MrgInfo',$MrgInfo);
			$stmt->bindParam(':Religion',$Religion);
			$stmt->bindParam(':Nation',$Nation);
			$stmt->bindParam(':BirthDate',$BirthDate);
			$stmt->bindParam(':StuPhn',$StuPhn);
			$stmt->bindParam(':StuEmail',$StuEmail);
			$stmt->bindParam(':GuarPhn',$GuarPhn);
			
			$stmt->bindParam(':Degree',$Degree);
			$stmt->bindParam(':Institute',$Institute);
			$stmt->bindParam(':BoardRoll',$BoardRoll);
			$stmt->bindParam(':PasYear',$PasYear);
			$stmt->bindParam(':Gpa',$Gpa);
			$stmt->bindParam(':BoardName',$BoardName);
			
			$stmt->bindParam(':Refer',$Refer); 
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':Status',$Status);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$student_id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successfully Done...');
				window.location.href='students.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}*/
	
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student Details <span> <a href="student-list">   <i class="bi bi-table"></i> </a> </span> </h1> <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
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
			  
</h5>
			  
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
    	<td><label class="control-label">Student No</label></td>
        <td><input class="form-control" type="text" name="StudentNo"  value="<?php echo $student_no; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Batch No </label></td>
		<td><select style="width:100%;" class="form-control" name="BatchNo" > <option value="<?php echo $batch_no; ?>"><?php echo $batch_no; ?></option><option value="Batch-25">Batch-25</option> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select Course </label></td>
		<td><select style="width:100%;" class="form-control" name="CourseName" > <option value="<?php echo $course_name; ?>"><?php echo $course_name; ?></option><option value="1">Office Application</option> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Student Name</label></td>
        <td><input class="form-control" type="text" name="StudentName"  value="<?php echo $student_name; ?>" /></td>
    </tr>
	  
	
	<tr style="display:none;">
    <td><label class="control-label">Gender</label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option value="<?php echo $gender; ?>"><?php echo $gender; ?> </option><option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option></select> </td>
    </tr>
	
	<tr>
    <td><label class="control-label">Blood Group</label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option value="<?php echo $gender; ?>"><?php echo $gender; ?> </option><option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option></select> </td>
    </tr>
	 
	<tr>
    	<td><label class="control-label">Father Name </label></td>
        <td><input class="form-control" type="text" name="FatherName" placeholder="Father Name" value="<?php echo $father_name; ?>" /></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Mother Name </label></td>
        <td><input class="form-control" type="text" name="MotherName" placeholder="Mother Name" value="<?php echo $mother_name; ?>"/></td>
    </tr> 
    
	<tr>
    	<td colspan="2"><center><label class="control-label"> Present Address  </label></center></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Village </label></td> 
        <td><input class="form-control" type="text" id="PreVill" name="PreVill" value="<?php echo $pre_vill; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Post Office</label></td>
        <td><input class="form-control" type="text" name="PrePost" value="<?php echo $pre_post; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Upazila</label></td>
		<td><select style="width:100%;" class="form-control" name="PreUpazila" > <option value="<?php echo $pre_upazila; ?>"><?php echo $pre_upazila; ?></option> <option value="Gaibhandha">Gaibhandha Sador </option> <option value="Sadullapur">Sadullapur </option> <option value="Polasbari">Polasbari </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">District</label></td>
		<td><select style="width:100%;" class="form-control" name="PreDistrict" > <option value="<?php echo $pre_dist; ?>"><?php echo $pre_dist; ?> </option><option value="Gaibhandha">Gaibhandha </option> <option value="Rangpur">Rangpur </option> <option value="Bogura">Bogura </option> </select> </td>
    </tr>
	
	<tr>
    	<td colspan="2"><center><label class="control-label"> Permanent Address  </label></center></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Village </label></td> 
        <td><input class="form-control" type="text" id="ParVill" name="ParVill" value="<?php echo $par_vill; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Post Office</label></td>
        <td><input class="form-control" type="text" name="ParPost" value="<?php echo $par_post; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Upazila</label></td>
		<td><select style="width:100%;" class="form-control" name="ParUpazila" > <option value="<?php echo $par_upazila; ?>"><?php echo $par_upazila; ?> </option><option value="Gaibhandha">Gaibhandha Sador </option> <option value="Sadullapur">Sadullapur </option> <option value="Polasbari">Polasbari </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">District</label></td>
		<td><select style="width:100%;" class="form-control" name="ParDistrict" > <option value="<?php echo $par_dist; ?>"><?php echo $par_dist; ?> </option> <option value="Gaibhandha">Gaibhandha </option> <option value="Rangpur">Rangpur </option> <option value="Bogura">Bogura </option> </select> </td>
    </tr>
	
	<tr>
    	<td colspan="2"><center><label class="control-label">   </label></center></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Marriage Info</label></td>
		<td><select style="width:100%;" class="form-control" name="MrgInfo" > <option value="<?php echo $marriage_info; ?>"><?php echo $marriage_info; ?></option><option value="Yes">Yes</option> <option value="No">No </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Religion</label></td>
		<td><select style="width:100%;" class="form-control" name="Religion" > <option value="<?php echo $religion; ?>"><?php echo $religion; ?></option><option value="Muslim">Muslim</option> <option value="Hindu">Hindu </option> <option value="Christian">Christian </option> <option value="Buddha">Buddha </option> <option value="Other">Other </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Nationality</label></td>
		<td><select style="width:100%;" class="form-control" name="Nation" > <option value="<?php echo $nationality; ?>" ><?php echo $nationality; ?></option> <option value="Bangladeshi" >Bangladeshi</option> <option value="Other">Other </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date Of Birth </label></td>
		<td><input class="form-control" type="text" name="BirthDate" placeholder="Date Of Birth" value="<?php echo $birth_date; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Student Phone </label></td>
        <td><input class="form-control" type="text" name="StuPhn" value="<?php echo $student_phone; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-Mail </label></td>
        <td><input class="form-control" type="text" name="StuEmail" value="<?php echo $student_email; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Guardian Phone </label></td>
        <td><input class="form-control" type="text" name="GuarPhn" value="<?php echo $guardian_phone; ?>" /></td>
    </tr>
	
	<tr>
    	<td colspan="2"><center><label class="control-label"> Educational Background </label></center></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Select Degree / Exam </label></td>
		<td><select style="width:100%;" class="form-control" name="Degree" > <option value="<?php echo $degree; ?>"><?php echo $degree; ?></option><option value="JSC">JSC </option> <option value="SSC">SSC </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">School/College/University</label></td>
        <td><input class="form-control" type="text" name="Institute" value="<?php echo $institute_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Board Roll </label></td>
        <td><input class="form-control" type="text" name="BoardRoll" value="<?php echo $board_roll; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Passing Year </label></td>
        <td><input class="form-control" type="text" name="PasYear" value="<?php echo $pass_year; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">GPA</label></td>
        <td><input class="form-control" type="text" name="Gpa" value="<?php echo $gpa; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select Board Name</label></td>
		<td><select style="width:100%;" class="form-control" name="BoardName" > <option value="<?php echo $gpa; ?>"><?php echo $gpa; ?></option><option value="Dhaka">Dhaka</option> <option value="Rajshahi">Rajshahi </option> <option value="Ranpur">Ranpur </option> <option value="Madrasa">Madrasa </option> <option value="BTEB">BTEB </option> </select> </td>
    </tr>
	 
	<tr>
    	<td colspan="2"><center><label class="control-label"> </label></center></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reference ( Name/Phone/Address )</label></td>
        <td><input class="form-control" type="text" name="Refer" <option value="<?php echo $reference; ?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date"  value="<?php echo $join_date; ?>" /></td>
    </tr>
	
	 
	
	<tr>
    	<td><label class="control-label">Active/In-Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="Status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In-Active</option>
		</select> </td>       
	</tr>
	
		
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<!--<input class="input-group" type="file" name="user_image" accept="image/*" />-->
        </td>
    </tr>
          
		 
    </table>
	
	<!--<button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update 
    </button>-->
    <a class="btn btn-danger" href="students"> <span class="glyphicon glyphicon-backward"></span> Back</a>
        
    
</form>
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>