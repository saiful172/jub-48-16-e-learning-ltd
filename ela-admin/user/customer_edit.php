<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$customer_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE customer_id =:uid');
		$stmt_edit->execute(array(':uid'=>$customer_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	 
	if(isset($_POST['btn_save_updates']))
	{
		
		$customer_name = $_POST['customer_name'];
		$customer_no = $_POST['customer_no'];
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
			$stmt = $DB_con->prepare('UPDATE customer 
									     SET customer_name=:customer_name, 
										     customer_no=:customer_no, 
										     position=:Position, 
										     gender=:gender, 
										     address=:address, 
										     contact_info=:contact_info, 
										     email=:Email, 
										     national_id=:national_id, 
										     status=:status, 
											 
										     userPic=:upic 
								       WHERE customer_id=:uid');
            
			
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':customer_no',$customer_no);
			$stmt->bindParam(':Position',$Position);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':status',$status);
			
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$customer_id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successfully Done...');
				window.location.href='customer.php';
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
		$customer_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE customer_id =:uid');
		$stmt_edit->execute(array(':uid'=>$customer_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$customer_name = $_POST['customer_name'];
		$contact_info = $_POST['contact_info'];
		 
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE orders
									     SET  client_name=:customer_name,
										     client_contact=:contact_info 
											 
								       WHERE customer_id=:uid');
			
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$customer_id);
				
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
		$customer_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE customer_id =:uid');
		$stmt_edit->execute(array(':uid'=>$customer_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$customer_name = $_POST['customer_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			
			
			$stmt = $DB_con->prepare('UPDATE orders_dues
									     SET  client_name=:customer_name,
										     client_contact=:contact_info 
											 
								       WHERE customer_id=:uid');
									   
			
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$customer_id);
				
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
		$customer_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE customer_id =:uid');
		$stmt_edit->execute(array(':uid'=>$customer_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$customer_name = $_POST['customer_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			
									   
			$stmt = $DB_con->prepare('UPDATE orders_details
									     SET  client_name=:customer_name,
										     client_contact=:contact_info 
											 
								       WHERE customer_id=:uid');						   
			
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$customer_id);
				
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container"> 
<center><h3><ol class="breadcrumb"> <li class="active">Client / Customer  Update</li></ol></h3></center>

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
    	<td><label class="control-label">Customer No</label></td>
        <td><input class="form-control" type="text" name="customer_no" placeholder="Customer No" value="<?php echo $customer_no; ?>"></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label"> Name</label></td>
        <td><input class="form-control" type="text" name="customer_name" placeholder="Customer Name" value="<?php echo $customer_name; ?>" /></td>
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
    <a class="btn btn-danger" href="customer.php"> <span class="glyphicon glyphicon-backward"></span> Cancel</a>
        
    
</form>

</div>
<?php include('../includes/footer.php');?>