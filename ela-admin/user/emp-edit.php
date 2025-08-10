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
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM employees WHERE  id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}


	if(isset($_POST['btn_save_updates']))
	{
		
		$Emp_name = $_POST['Emp_name'];
		$address = $_POST['address'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Nid = $_POST['Nid'];
		$Salary = $_POST['Salary'];
		$Position = $_POST['Position'];
		$status = $_POST['status'];
		
		$Date = $_POST['Date'];
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../staff/user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					//unlink($upload_dir.$edit_row['userPic']);
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
			$stmt = $DB_con->prepare('UPDATE employees 
									     SET emp_name=:Emp_name,
										     address=:address, 
										     phone=:Phone, 
										     email=:Email, 
										     national_id=:Nid, 
										     salary=:Salary, 
										     position=:Position, 
										     status=:status, 
										     join_date=:Date, 
											 
										     userPic=:upic 
								       WHERE  id=:uid');

			
			$stmt->bindParam(':Emp_name',$Emp_name);
			
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':Nid',$Nid);
			$stmt->bindParam(':Salary',$Salary);
			$stmt->bindParam(':Position',$Position);
			$stmt->bindParam(':status',$status);
			
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='emp-list';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employee Info Edit</h1> <hr>
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
    	<td><label class="control-label">Employee's  name </label></td>
        <td><input class="form-control" type="text" name="Emp_name" placeholder="Employee's  name " value="<?php echo $emp_name; ?>" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Address </label></td>
       
        <td><input class="form-control" type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No.</label></td>
        <td><input class="form-control" type="text" name="Phone" placeholder="Mobile No." value="<?php echo $phone; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Email</label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="Email" value="<?php echo $email; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> National ID Card</label></td>
        <td><input class="form-control" type="text" name="Nid" placeholder="National ID Card" value="<?php echo $national_id; ?>" /></td>
    </tr>
    
	
	<tr>
    	<td><label class="control-label">Salary</label></td>
        <td><input class="form-control" type="text" name="Salary" placeholder="Salary" value="<?php echo $salary; ?>" /></td>
    </tr>
    
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><input class="form-control" type="text" name="Position" placeholder="Position" value="<?php echo $position; ?>" /></td>
    </tr>
    
	
		<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
	
	<tr style="display:none;" >
    	<td><label class="control-label">Active / In-Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In-Active</option>
		</select> </td>       
	</tr>
	
	
    <tr>
    	<td><label class="control-label">Photo  </label></td>
        <td><img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" width="150px" height="200px"  /></td>
    </tr>
	
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="emp-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>