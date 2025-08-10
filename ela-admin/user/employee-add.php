<?php require_once 'header.php'; ?>
<?php  
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$Emp_name = $_POST['Emp_name'];
		$address = $_POST['address'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Nid = $_POST['Nid'];
		
		$GrossSalary = $_POST['GrossSalary'];
		$HouseRent = $_POST['HouseRent'];
		$MediAlow = $_POST['MediAlow']; 
		$Salary = $_POST['Salary'];
		
		$Position = $_POST['Position'];
		
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($Emp_name)){
			$errMSG = "Please Enter Employee Name.";
		}
		else if(empty($address)){
			$errMSG = "Please Enter address.";
		}
		
		else if(empty($address)){
			$errMSG = "Please Enter address.";
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
			$stmt = $DB_con->prepare('INSERT INTO employees (user_id,emp_name,address,phone,email,national_id,gross,house,medical,salary,position,join_date,status,userPic)
													  VALUES(:UserId,:Emp_name,:address,:Phone,:Email,:Nid,:GrossSalary,:HouseRent,:MediAlow,:Salary,:Position,:Date,1,:upic)');
			
		    $stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Emp_name',$Emp_name);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':Nid',$Nid);
			
			$stmt->bindParam(':GrossSalary',$GrossSalary);
			$stmt->bindParam(':HouseRent',$HouseRent);
			$stmt->bindParam(':MediAlow',$MediAlow);
			$stmt->bindParam(':Salary',$Salary);
			
			$stmt->bindParam(':Position',$Position);
			
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
			?>
                <script>
				alert('Employee Add Successful...');
				window.location.href='employee';
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


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
</head>
<body> 
<center><h4><ol class="breadcrumb"> <li class="active">  New Employee</li></ol></h4></center>


<div class="col-md-2">

	<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="employee_add.php"> <span class="glyphicon glyphicon-plus"></span> Add new employee</a> 
		</div>
		
		<div class="col-md-12">
		 <p><a class="btn btn-info btn-w100" href="employee.php"> <span class="glyphicon glyphicon-user"></span> Employee List </a></p>
		</div>
			
	 
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success btn-w100" href="emp_all_report.php"> <span class="glyphicon glyphicon-file"></span> All Report</a> 
		</div>
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success btn-w100"  href="EmployeeReportByDate.php"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div>
		
		
		</div>
		</div>

<div class="col-md-10">  	
<div class="col-md-7">  
  

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
	
  <tr style="display:none;">
	         <?php	//  একই সাথে   employees_salary ..এ  ডাটা পাঠানোর জন্য //
				  
				   $pq=mysqli_query($con,"select MAX(id)+1 as max_id from employees ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
      <td>   <input class="form-control" type="text" name="EmpId"  value="<?php echo $pqrow['max_id']; ?>"  /> </td>
      <?php }?>
	  
	</tr>
		
	<tr>
    	<td><label class="control-label">Employee's Name</label></td>
        <td><input class="form-control" type="text" name="Emp_name" placeholder="Employee's Name " value="<?php echo $Emp_name; ?>" required></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Address </label></td>
       
        <td><input class="form-control" type="text" id="address" name="address" placeholder="Address"   /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No.</label></td>
        <td><input class="form-control" type="text" name="Phone" placeholder="Mobile No."  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Email</label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="Email" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> National ID Card </label></td>
        <td><input class="form-control" type="text" name="Nid" placeholder="National ID Card "  /></td>
    </tr>
     
  
	<tr>
    	<td><label class="control-label">Gross Salary</label></td>
        <td><input class="form-control" type="text" name="GrossSalary" id="GrossSalary"  placeholder="Gross Salary"  oninput="myFunction()" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">House Rent</label></td>
        <td><input class="form-control" type="text" name="HouseRent" id="HouseRent"  placeholder="House Rent" oninput="myFunction()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Medical Allowance</label></td>
        <td><input class="form-control" type="text" name="MediAlow" id="MediAlow" placeholder="Medical Allowance" oninput="myFunction()" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Total Salary</label></td>
        <td><input class="form-control" type="text" name="Salary" id="Salary" placeholder="Total Salary"  /></td>
    </tr>
	
	<script>
  function myFunction() {
    var gs = Number (document.getElementById("GrossSalary").value);
    var hr = Number (document.getElementById("HouseRent").value);
    var ma = Number (document.getElementById("MediAlow").value); 
	
	var z = Number (gs + hr + ma);  

    document.getElementById("Salary").value = z; 
	                  }
  </script> 
    
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><input class="form-control" type="text" name="Position" placeholder="Position" /></td>
    </tr>
    
	
	<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><input class="form-control" type="Date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo  </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /> Photo Size Width=300px X Height=320px (JPG or PNG) </td>
    </tr>
    
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp;Save
        </button>
        </td>
    </tr>
    
</form> 

	
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>





