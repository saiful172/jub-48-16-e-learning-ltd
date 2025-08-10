<?php require_once 'header.php'; ?>
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	 
	
	if(isset($_POST['btnsave']))
	{
		$member_id = $_POST['member_id'];
		$customer_no = $_POST['customer_no'];
		
		$customer_name = $_POST['customer_name'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$national_id = $_POST['national_id'];
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($customer_no)){
			$errMSG = "Please Enter customer_no.";
		}
		else if(empty($customer_name)){
			$errMSG = "Please Enter customer_name.";
		}
		
		else
		{
			$upload_dir = '../staff/user_images/'; // upload directory
	
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
			$stmt = $DB_con->prepare('INSERT INTO customer(member_id,customer_no,customer_name,gender,address,contact_info,national_id,join_date,status,userPic) VALUES(:member_id,:customer_no, :customer_name, :gender, :address,:contact_info,:national_id,:Date,1,:upic)');
			$stmt->bindParam(':member_id',$member_id);
			$stmt->bindParam(':customer_no',$customer_no);
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
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
<title>Add New Product </title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>



<div class="container">

<center><h1>Customer Panel</h1></center>

	<div class="page-header">
    	<h1 class="h2">&nbsp;<a class="btn btn-default" href="customer_add.php"> <span class="glyphicon glyphicon-plus"></span> Add New Customer </a> <a class="btn btn-default" href="customer.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Customer </a></h1>
    </div>
    

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
    	<td><label class="control-label">User Id</label></td>
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td><input class="form-control" type="text" name="member_id1"  value="<?php echo $pqrow['userid']; ?>" disabled="true" />
        <input class="form-control" type="hidden" name="member_id"  value="<?php echo $pqrow['userid']; ?>" /></td>
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Customer No </label></td>
        <td><input class="form-control" type="text" name="customer_no" placeholder="Enter Customer No" value="<?php echo $customer_no; ?>" /></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Customer Name </label></td>
        <td><input class="form-control" type="text" name="customer_name" placeholder="Customer Name" value="<?php echo $customer_name; ?>" /></td>
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
    	<td><label class="control-label">Phone No :</label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="contact_info" value="<?php echo $contact_info; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">National Id</label></td>
        <td><input class="form-control" type="text" name="national_id" placeholder="national_id" value="<?php echo $national_id; ?>" /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong>Powered By </strong> <a target="_blank" href="http://www.itmsofts.com/">ITM-SOFTS | itmsofts.com</a>
</div>


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



