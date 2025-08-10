<?php require_once 'header.php'; ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$supplier_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE supplier_id =:uid');
		$stmt_edit->execute(array(':uid'=>$supplier_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$supplier_no = $_POST['supplier_no'];
		$supplier_name = $_POST['supplier_name'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
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
									     SET supplier_no=:supplier_no,
										     supplier_name=:supplier_name, 
										     gender=:gender, 
										     address=:address, 
										     contact_info=:contact_info, 
										     national_id=:national_id, 
										     status=:status, 
											 
										     userPic=:upic 
								       WHERE supplier_id=:uid');
			
			$stmt->bindParam(':supplier_no',$supplier_no);
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':status',$status);
			
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$supplier_id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('আপডেট সম্পন্ন হয়েছে.....');
				window.location.href='supplier.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!--Update product_buy Information-->
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$supplier_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE supplier_id =:uid');
		$stmt_edit->execute(array(':uid'=>$supplier_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$supplier_name = $_POST['supplier_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product_buy 
									     SET  supplier_name=:supplier_name,
										     phone=:contact_info 
											 
								       WHERE supplier_id=:uid');
		
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$supplier_id);
				
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


<!--Update product_buy_details Information-->
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$supplier_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM supplier WHERE supplier_id =:uid');
		$stmt_edit->execute(array(':uid'=>$supplier_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$supplier_name = $_POST['supplier_name'];
		$contact_info = $_POST['contact_info'];
		
		
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
											   
		$stmt = $DB_con->prepare('UPDATE product_buy_details 
									     SET  supplier_name=:supplier_name,
										     phone=:contact_info 
											 
								       WHERE supplier_id=:uid');
			
			
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':uid',$supplier_id);
				
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
<title>Supplier Update  </title>

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Supplier Update</li></ol></h4></center>


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
   
    
	<table class="table table-bordered table-responsive">
	
    
	
	<tr>
    	<td><label class="control-label">Supplier No</label></td>
        <td><input class="form-control" type="text" name="supplier_no" placeholder="Enter Supplier No" value="<?php echo $supplier_no; ?>" /></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Supplier Name</label></td>
        <td><input class="form-control" type="text" name="supplier_name" placeholder="Supplier Name" value="<?php echo $supplier_name; ?>" /></td>
    </tr>
	
	<tr>
    <td><label class="control-label">Gender</label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option>Male</option> <option>Female </option> </select> </td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Address</label></td>
        <td><input class="form-control" type="text" name="address" placeholder="address" value="<?php echo $address; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile</label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="contact_info" value="<?php echo $contact_info; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">National Id</label></td>
        <td><input class="form-control" type="text" name="national_id" placeholder="National Id" value="<?php echo $national_id; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Active / In-Active</label></td>
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
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="supplier.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>



</div>
</body>
</html>