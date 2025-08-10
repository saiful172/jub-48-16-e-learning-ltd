<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php 
	
	if(isset($_POST['btnsave']))
	{
		$member_id = $_POST['member_id'];   
		$customer_no = $_POST['customer_no'];
		$customer_name = $_POST['customer_name'];
		$Position = $_POST['Position'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$Email = $_POST['Email'];
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
		
		else if(empty($contact_info)){
			$errMSG = "Please Enter Phone Number.";
		}
		
		if (isset($_POST['contact_info']) && $_POST['contact_info'] != '') {
		$contact_info = $_POST['contact_info'];
		$checkQuery = mysqli_query($con, "SELECT * FROM `customer` WHERE `contact_info`='$contact_info' ");
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
			$stmt = $DB_con->prepare('INSERT INTO customer(member_id,customer_no,customer_name,position,gender,address,contact_info,email,national_id,join_date,status,userPic)
			VALUES(:member_id,:customer_no, :customer_name, :Position, :gender, :address,:contact_info,:Email,:national_id,:Date,1,:upic)');
			$stmt->bindParam(':member_id',$member_id);
			$stmt->bindParam(':customer_no',$customer_no);
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':Position',$Position);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':national_id',$national_id);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute()) {
		  ?>
              
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

<?php 
	
		if(isset($_POST['btnsave']))
	{
		
		$member_id = $_POST['member_id'];
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		$customer_name = $_POST['customer_name'];
		$contact_info = $_POST['contact_info'];  
		
		if(empty($customer_name)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($contact_info)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		 
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact, pre_due,today_total,grand_total,paid,recent_due,cuses,order_type,status,custom_invoice,paym_type) 
			                                              VALUES(0,:member_id,:CustId,:Date,:customer_name,:contact_info,"0", "0", "0", "0", "0","New Customer",1,1,0,0 )');
			
			
			$stmt->bindParam(':member_id',$member_id);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':contact_info',$contact_info);  
			
			
			if($stmt->execute())
			{
				?>
              <script> 
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

<?php 
	
		if(isset($_POST['btnsave']))
	{
		
		$member_id = $_POST['member_id'];
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		$customer_name = $_POST['customer_name'];
		$contact_info = $_POST['contact_info'];
		
		if(empty($customer_name)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($contact_info)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO orders_dues (order_id,user_id,customer_id,order_date, last_update, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,dues_or_paid,dues_or_paid_status,cuses,custom_invoice,paym_type ) 
			                                              VALUES("0000",:member_id,:CustId,:Date,:Date,:customer_name,:contact_info, "0", "0", "0", "0", "0", "Dues","4", "New Customer",0,0 )');
			
			
			$stmt->bindParam(':member_id',$member_id);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':customer_name',$customer_name);
			$stmt->bindParam(':contact_info',$contact_info);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='customer-list';
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

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main1">

    <div class="pagetitle">
      <h1>Add New Customer |  <span> <a href="customer-list">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
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
			  
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
	<table class="table table-hover table-responsive">
	
   <tr>
    	
		<?php
				
				   
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="member_id"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
    <tr>
	         <?php	//  একই সাথে  Order Due এ ডাটা পাঠানোর জন্য //
				   
				   $pq=mysqli_query($con,"select MAX(customer_id)+1 as max_id from customer ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
        <input class="form-control" type="hidden" name="CustId"  value="<?php echo $pqrow['max_id']; ?>"  /> 
      <?php }?>
	  
	</tr>
	
	<tr style="display:none;">
	<td><label class="control-label">Customer No </label></td>
	         <?php	// Auto Customer No
				  
				   $pq=mysqli_query($con,"select MAX(customer_no)+1 as max_id from customer  where member_id='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
      <td>   
      <input class="form-control" type="text" name="customer_no"  value="21"  />  </td>
      <?php }?>
	  
	</tr>
	
		
	<tr>
    	<td><label class="control-label">Customer Name </label></td>
        <td><input class="form-control" type="text" name="customer_name" placeholder="Customer Name" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Position </label></td>
        <td><input class="form-control" type="text" name="Position" value="..." /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Gender </label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option>Male </option> <option>Female </option> </select> </td>
    </tr>
    		
	<tr>
    	<td><label class="control-label">Address </label></td>
       
        <td><input class="form-control" type="text" id="address" name="address" value="..."  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Phone No </label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="Phone No " value="..." /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-Mail </label></td>
        <td><input class="form-control" type="text" name="Email" value="..." /></td>
    </tr>
	
	<tr class="d-none">
    	<td><label class="control-label">National Id </label></td>
        <td><input class="form-control" type="text" name="national_id" value="..."  /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr style="display:none;">
    	<td><label class="control-label">Photo  </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
	
     
    </table>
    
	<button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp;Save
        </button>
</form>

            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>

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