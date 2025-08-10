<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$sup_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE sup_id =:uid');
		$stmt_edit->execute(array(':uid'=>$sup_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	 
	if(isset($_POST['btn_save_updates']))
	{
		
		$supplier_name = $_POST['supplier_name'];
		$sup_no = $_POST['sup_no'];
		$Position = $_POST['Position'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$Email = $_POST['Email'];
		$national_id = $_POST['national_id'];
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
			$stmt = $DB_con->prepare('UPDATE supplier 
									     SET supplier_name=:supplier_name, 
										     sup_no=:sup_no, 
										     position=:Position, 
										     gender=:gender, 
										     address=:address, 
										     contact_info=:contact_info, 
										     email=:Email, 
										     national_id=:national_id, 
										     status=:status, 
											 
										     userPic=:upic 
								       WHERE sup_id=:uid');
            
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':sup_no',$sup_no);
			$stmt->bindParam(':Position',$Position);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':status',$status);
			
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$sup_id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successfully Done...');
				window.location.href='supplier';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!--Update orders Information -->
<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$sup_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE sup_id =:uid');
		$stmt_edit->execute(array(':uid'=>$sup_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$supplier_name = $_POST['supplier_name'];
		$contact_info = $_POST['contact_info'];
		 
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE sup_orders
									     SET  client_name=:supplier_name,
										     client_contact=:contact_info 
											 
								       WHERE sup_id=:uid');
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$sup_id);
				
			if($stmt->execute()){
				?>
                <script>
				
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!--Update orders_dues Information-->
<?php 

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$sup_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE sup_id =:uid');
		$stmt_edit->execute(array(':uid'=>$sup_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$supplier_name = $_POST['supplier_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			
			
			$stmt = $DB_con->prepare('UPDATE sup_orders_dues
									     SET  client_name=:supplier_name,
										     client_contact=:contact_info 
											 
								       WHERE sup_id=:uid');
									   
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$sup_id);
				
			if($stmt->execute()){
				?>
                <script>
				
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>


<!--Update orders_details Information-->
<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$sup_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE sup_id =:uid');
		$stmt_edit->execute(array(':uid'=>$sup_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$supplier_name = $_POST['supplier_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			
									   
			$stmt = $DB_con->prepare('UPDATE sup_orders_details
									     SET  client_name=:supplier_name,
										     client_contact=:contact_info 
											 
								       WHERE sup_id=:uid');						   
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$sup_id);
				
			if($stmt->execute()){
				?>
                <script>
				
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
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
 
<center><h3><ol class="breadcrumb"> <li class="active">Supplier Update</li></ol></h3></center>


<div class="col-md-2">
	<div class="buttons"> 
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="supplier"> <span class="glyphicon glyphicon-user"></span> Supplier List  </a> 
		</div>
		 		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success" style="width:100%" href="supplier-active-view"> <span class="glyphicon glyphicon-file"></span> All Supplier Report </a> 
		</div> 
		<div class="col-md-12">
		<a class="btn btn-success"  style="width:100%" href="SupReportByDate"> <span class="glyphicon glyphicon-file"></span> Date Wise Report</a> 
		</div> 
		</div>
</div>
		
		
<div class="col-md-10"> 
<div class="col-md-7">

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
	
    
	
	<tr style="display:none;">
    	<td><label class="control-label">Supplier No</label></td>
        <td><input class="form-control" type="text" name="sup_no" placeholder="Supplier No" value="<?php echo $sup_no; ?>"></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Supplier Name</label></td>
        <td><input class="form-control" type="text" name="supplier_name" placeholder="Supplier Name" value="<?php echo $supplier_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><input class="form-control" type="text" name="Position" placeholder="Position" value="<?php echo $position; ?>" /></td>
    </tr>
	
	<tr style="display:none;">
    <td><label class="control-label">Gender</label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option>Male</option> <option>Female </option> </select> </td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Address</label></td>
        <td><input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Phone No</label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="Phone No" value="<?php echo $contact_info; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-Mail</label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="Email" value="<?php echo $email; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">National Id</label></td>
        <td><input class="form-control" type="text" name="national_id" placeholder="National Id" value="<?php echo $national_id; ?>" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Active/In-Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In-Active</option>
		</select> </td>       
	</tr>
	
		
	
    <tr style="display:none;">
    	<td><label class="control-label">Photo </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
          
		 <tr> <td></td>  <td></td></tr>
		 
    </table>
	
	<button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update 
    </button>
    <a class="btn btn-danger" href="supplier"> <span class="glyphicon glyphicon-backward"></span> Cancel</a>
        
    
</form>

</div>
<div class="col-md-12">
<?php include('../includes/footer.php');?>
</div>
</div>