<?php require_once 'header.php'; ?>
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$user_id = $_POST['user_id'];
		$supplier_no = $_POST['supplier_no'];
		
		$supplier_name = $_POST['supplier_name'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$national_id = $_POST['national_id'];
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($supplier_no)){
			$errMSG = "Please Enter supplier_no.";
		}
		else if(empty($supplier_name)){
			$errMSG = "Please Enter supplier_name.";
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
			$stmt = $DB_con->prepare('INSERT INTO supplier (user_id,supplier_no,supplier_name,gender,address,contact_info,national_id,join_date,status,userPic) VALUES(:user_id,:supplier_no, :supplier_name, :gender, :address,:contact_info,:national_id,:Date,1,:upic)');
			$stmt->bindParam(':user_id',$user_id);
			$stmt->bindParam(':supplier_no',$supplier_no);
			$stmt->bindParam(':supplier_name',$supplier_name);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "নতুন Supplier Add সম্পন্ন হয়েছে....";
				//header("refresh:2; customer.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active"> Add New Supplier  </li></ol></h4></center>



    	<h2 class="h2">&nbsp;<a class="btn btn-default" href="supplier_add.php"> <span class="glyphicon glyphicon-plus"></span>    Add New </a> <a class="btn btn-default" href="supplier.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View </a></h1>
  

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
	    
	<table class="table table-bordered table-responsive">
	
   <tr>
    	
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="user_id"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Supplier No </label></td>
        <td><input class="form-control" type="text" name="supplier_no" placeholder="Supplier No" value="<?php echo $supplier_no; ?>" /></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Supplier Name </label></td>
        <td><input class="form-control" type="text" name="supplier_name" placeholder="Supplierের Name" value="<?php echo $supplier_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option>Male </option> <option>Female </option> </select> </td>
    </tr>
    
		
		
	<tr>
    	<td><label class="control-label">Address </label></td>
       
        <td><input class="form-control" type="text" id="address" name="address" placeholder="Address:" value="<?php echo $address; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile </label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="Mobile" value="<?php echo $contact_info; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">National Id</label></td>
        <td><input class="form-control" type="text" name="national_id" placeholder="National Id" value="<?php echo $national_id; ?>" /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


</div>

</body>
</html>

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



