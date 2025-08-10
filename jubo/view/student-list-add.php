<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		
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
		
		
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($StuName)){
			$errMSG = "Please Enter Student Name.";
		}
		else if(empty($FatherName)){
			$errMSG = "Please Enter Father Name";
		}
		
		else if(empty($Contact)){
			$errMSG = "Please Enter Phone Number.";
		}
		
		if (isset($_POST['Contact']) && $_POST['Contact'] != '') {
		$Contact = $_POST['Contact'];
		$checkQuery = mysqli_query($con, "SELECT * FROM `student_list` WHERE `contact`='$Contact' ");
		if (mysqli_num_rows($checkQuery) > 0) {
		$errMSG = "This Phone Number Already Exist !";
		}
		
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			//else{
			//	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			//}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO student_list(user_id,district,session,batch,stu_name,gender,father_name,mother_name,age,contact,email,nid_no,blood_grp,computer,profession,religion,disabilities,address,perma_address,edu_qual,pass_year,linked_in,upwork,fiver,link_three,link_four,join_date,status,userPic)
			VALUES(:UserId,:District,:Session,:Batch,:StuName,:Gender, :FatherName, :MotherName,:Age,:Contact,:Email,:NidNo,:BloodGrp,:Computer,:Profession,:Religion,:Disabilities,:Address,:PermaAddress,:EduQual,:PassYear,:LinedIn,:Upwork,:Fiverr,:LinkThree,:LinkFour,:Date,1,:upic)');
			$stmt->bindParam(':UserId',$UserId);
			
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
			
			
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute()) {
			?>
         <script>
				alert('Data Successfully Add ...');
				window.location.href='student-list-add.php';
				</script>
          <?php			
		
			}
			else
			{
				$errMSG = "error while inserting....";
			}
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


    	<h1 class="h2"><a class="btn btn-default" href="student-list-add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Student</a> 
		<a class="btn btn-default" href="student-list.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Student </a></h1>
  

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
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>">
		<?php }?>
    </tr>
	
    
		
	<tr>
    	<td><label class="control-label">Select District </label></td>
        <td>
		<Select class="form-control" type="text" name="District" required>
		<option value="" >Select District </option>
		<option>Dhaka</option>
		<option>Rajshahi</option>
		<option>Sylhet</option>
		</Select>
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select Session </label></td>
        <td><Select class="form-control" type="text" name="Session"  required>
		<option value="">Select Session </option>  
		<option value="1">Session-01 (March-May-2023) </option>
		<option value="2">Session-02 (June-August-2023) </option>
		</Select></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select  Batch </label></td>
        <td><Select class="form-control" type="text" name="Batch"  required>
		<option value="">Select  Batch</option>
		<option value="1">Batch-1</option>
		<option value="2">Batch-2</option> 
		</Select>
		</td>
    </tr>
	
	<!------------------------------------------------->
	<tr>
    	<td><label class="control-label">Student Name </label></td>
        <td><input class="form-control" type="text" name="StuName" placeholder="Student Name"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
        <td><Select class="form-control" type="text" name="Gender" required >
		<option value="">Select  Gender</option>
		<option>Male</option>
		<option>Female</option>
		<option>Others</option>
		</Select>
		</td> 
    </tr>
	
	<tr>
    	<td><label class="control-label">Father Name </label></td>
		<td><input style="width:100%;" class="form-control" name="FatherName" placeholder="Father Name"  required></td>
    </tr>
    
		
		
	<tr>
    	<td><label class="control-label">Mother Name </label></td>
       
        <td><input class="form-control" type="text" id="MotherName" name="MotherName" placeholder="Mother Name" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Age </label></td>
        <td><input class="form-control" type="text" name="Age" placeholder="Age " required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Phone </label></td>
        <td><input class="form-control" type="text" name="Contact" placeholder="Phone"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-mail </label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="E-mail"  required></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">NID/Birth Certificate No</label></td>
        <td><input class="form-control" type="text" name="NidNo" placeholder="NID/Birth Certificate No"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Blood Group </label></td>
        <td><input class="form-control" type="text" name="BloodGrp" placeholder="Blood Group"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Have a Computer </label></td> 
		<td>
		<input type="radio"   name="Computer" value="Yes" required> Yes  
  		<input type="radio"   name="Computer" value="No" required> No 
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Profession</label></td>
        <td><input class="form-control" type="text" name="Profession" placeholder="Profession" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Religion </label></td>
        <td><Select class="form-control" type="text" name="Religion" required >
		<option value="">Select  Religion</option>
		<option>Islam</option>
		<option>Hindu </option>
		<option>Others</option>
		<option>Others</option>
		</Select>
		</td> 
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Disabilities</label></td>
  		 <td>   
        <input type="radio"   name="Disabilities" > Yes	
		<input type="radio"   name="Disabilities" checked> No
		</td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Present Address </label></td>
        <td><input class="form-control" type="text" name="Address" placeholder="Present Address"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Permanent Address </label></td>
        <td><input class="form-control" type="text" name="PermaAddress" placeholder="Permanent Address"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Last Academic Qualification </label></td>
        <td><input class="form-control" type="text" name="EduQual" placeholder="Last Academic Qualification"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Passing Year </label></td>
        <td><input class="form-control" type="text" name="PassYear" placeholder="Passing Year"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">LinkedIn </label></td>
        <td><input class="form-control" type="text" name="LinedIn" placeholder="LinkedIn Link"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Up-Work </label></td>
        <td><input class="form-control" type="text" name="Upwork" placeholder="Upwork Link"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Fiver </label></td>
        <td><input class="form-control" type="text" name="Fiverr" placeholder="Fiverr Link"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 3 </label></td>
        <td><input class="form-control" type="text" name="LinkThree" placeholder="Freelancing Link 3 "  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Freelancing Link 4 </label></td>
        <td><input class="form-control" type="text" name="LinkFour" placeholder="Freelancing Link 4 "  required></td>
    </tr>
	
	
	
		<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo  </label></td>
        <td> Please Upload Your Passport Size(300px X 320px) Image Here :
		<input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
	
	<tr> <td></td> <td></td> </tr>
     
    </table>
	
	 <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp;Save
        </button>
        </td>
    </tr>
    
</form>

</div>

<?php include('includes/footer.php');?>

<script>
	$("#loadGroup").on("click", function(){
		
		var groupID = $("#group_no").val();
		if(groupID == "")
		{
			alert("Please enter a valid Group ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_group.php?c=" + groupID, success: function(result){
				var customerGroup = JSON.parse(result);
				$("#group_name1").val(customerGroup.groupName);
				$("#group_name").val(customerGroup.groupName);
				$("#address1").val(customerGroup.villageName);
				$("#address").val(customerGroup.villageName);
				
			}});
		}
	});
</script>



