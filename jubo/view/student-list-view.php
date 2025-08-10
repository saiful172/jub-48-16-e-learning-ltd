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
		
		$District = $_POST['District'];
		$Session = $_POST['Session'];
		$Batch = $_POST['Batch'];
		
		$StuName = $_POST['StuName'];
		$Gender = $_POST['Gender'];

		$FatherName = $_POST['FatherName'];
		$MotherName = $_POST['MotherName'];
		$Age = $_POST['Age'];
		$Contact = $_POST['Contact'];
		$Email = $_POST['Email'];
		
		$NidNo = $_POST['NidNo'];
		$BloodGrp = $_POST['BloodGrp'];
		$Computer = $_POST['Computer'];
		$Profession = $_POST['Profession'];
		$Religion = $_POST['Religion'];
		$Disabilities = $_POST['Disabilities'];
		
		$Address = $_POST['Address'];
		$PermaAddress = $_POST['PermaAddress'];
		$EduQual = $_POST['EduQual'];
		$PassYear = $_POST['PassYear'];
		$LinedIn = $_POST['LinedIn'];
		$Upwork = $_POST['Upwork'];
		$Fiverr = $_POST['Fiverr'];
		$LinkThree = $_POST['LinkThree'];
		$LinkFour = $_POST['LinkFour'];
		
		
		$status = $_POST['status'];
		$join_date = $_POST['join_date'];
			
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
									     SET district=:District,
											session=:Session,
											batch= :Batch,
											stu_name=:StuName, 
											gender=:Gender, 
										     father_name=:FatherName, 
										     mother_name=:MotherName, 
										     age=:Age, 
										     contact=:Contact, 
											 
										     email=:Email, 
											 
										     nid_no=:NidNo, 
										     blood_grp=:BloodGrp, 
										     computer=:Computer, 
										     profession=:Profession, 
										     religion=:Religion, 
										     disabilities=:Disabilities, 
										     address=:Address,
											 
										     perma_address=:PermaAddress, 
										     edu_qual=:EduQual, 
										     pass_year=:PassYear, 
										     linked_in=:LinedIn, 
										     upwork=:Upwork, 
										     fiver=:Fiverr, 
										     link_three=:LinkThree, 
										     link_four=:LinkFour, 
											 
										     status=:status, 
											 
										     userPic=:upic 
								       WHERE student_id=:uid');

			$stmt->bindParam(':District',$District);
			$stmt->bindParam(':Session',$Session);
			$stmt->bindParam(':Batch',$Batch);
			
			$stmt->bindParam(':StuName',$StuName);
			$stmt->bindParam(':Gender',$Gender);
			$stmt->bindParam(':FatherName',$FatherName);
			$stmt->bindParam(':MotherName',$MotherName);
			$stmt->bindParam(':Age',$Age);
			$stmt->bindParam(':Contact',$Contact);
			$stmt->bindParam(':Email',$Email);
			
			$stmt->bindParam(':NidNo',$NidNo);
			$stmt->bindParam(':BloodGrp',$BloodGrp);
			$stmt->bindParam(':Computer',$Computer);
			$stmt->bindParam(':Profession',$Profession);
			$stmt->bindParam(':Religion',$Religion);
			$stmt->bindParam(':Disabilities',$Disabilities);
			
			
			$stmt->bindParam(':Address',$Address);
			$stmt->bindParam(':PermaAddress',$PermaAddress);
			$stmt->bindParam(':EduQual',$EduQual);
			$stmt->bindParam(':PassYear',$PassYear);
			$stmt->bindParam(':LinedIn',$LinedIn);
			$stmt->bindParam(':Upwork',$Upwork);
			$stmt->bindParam(':Fiverr',$Fiverr);
			$stmt->bindParam(':LinkThree',$LinkThree);
			$stmt->bindParam(':LinkFour',$LinkFour);
			
			
			$stmt->bindParam(':status',$status);
			$stmt->bindParam(':upic',$userpic);
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
<center><h3><ol class="breadcrumb"> <li class="active">Student Information</li></ol></h3></center>

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
    	<td><label class="control-label"> District </label></td>
        <td><?php echo $district; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Session </label></td>
        <td><?php echo $session; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">  Batch </label></td>
        <td><?php echo $batch; ?></td>
		
    </tr>
		
	
	<tr>
    	<td><label class="control-label">Student Name</label></td>
        <td><?php echo $stu_name; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
        <td><?php echo $gender; ?>
		</td>
      
    </tr>
	
	<tr>
    <td><label class="control-label">Father Name</label></td>
		<td><?php echo $father_name; ?> </td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Mother Name</label></td>
        <td><?php echo $mother_name; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Age</label></td>
        <td><?php echo $age; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Contact</label></td>
        <td><?php echo $contact; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-mail </label></td>
        <td><?php echo $email; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">NID/Birth Certificate No</label></td>
        <td><?php echo $nid_no; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Blood Group </label></td>
        <td><?php echo $blood_grp; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Have a Computer </label></td>
        <td><?php echo $computer; ?></td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Profession</label></td>
        <td><?php echo $email; ?></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Religion </label></td>
        <td><?php echo $email; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Disabilities</label></td>
        <td><?php echo $disabilities; ?></td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Address </label></td>
        <td><?php echo $address; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Permanent Address </label></td>
        <td><?php echo $perma_address; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Last Academic Qualification </label></td>
        <td><?php echo $edu_qual; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Passing Year </label></td>
        <td><?php echo $pass_year; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">LinedIn </label></td>
        <td><?php echo $linked_in; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Upwork </label></td>
        <td><?php echo $upwork; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Fiverr </label></td>
        <td><?php echo $fiver; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 3 </label></td>
        <td><?php echo $link_three; ?></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 4 </label></td>
        <td><?php echo $link_four; ?></td>
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
        	
        </td>
    </tr>
     
	 <tr><td></td><td></td> </tr>
    
    </table>
	
	 <tr>
        <td>
        
        <a class="btn btn-success" href="student-list.php"> <span class="glyphicon glyphicon-backward"></span> Back</a>
        
        </td>
    </tr>
    
</form>

</div>
<?php include('includes/footer.php');?>