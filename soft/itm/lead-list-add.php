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
		$user_id = $_POST['user_id'];
		$category = $_POST['category'];
		
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$Company = $_POST['Company'];
		$Position = $_POST['Position'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$Email = $_POST['Email'];
		$Website = $_POST['Website'];
		
		$WhatsApp = $_POST['WhatsApp'];
		$Skype = $_POST['Skype'];
		$Facebook = $_POST['Facebook'];
		$LinkedIn = $_POST['LinkedIn'];
		$YouTube = $_POST['YouTube'];
		$Twitter = $_POST['Twitter'];
		$Instagram = $_POST['Instagram'];
		$Pinterest = $_POST['Pinterest'];
		
		$comments = $_POST['comments'];
		 
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($contact_info)){
			$errMSG = "Please Enter Phone No.";
		}
		else if(empty($name)){
			$errMSG = "Please Enter name.";
		}
		
		if (isset($_POST['contact_info']) && $_POST['contact_info'] != '') {
		// $contact_info = $_POST['contact_info'];
		$checkQuery = mysqli_query($con, "SELECT * FROM `phone_book` WHERE user_id='".$_SESSION['id']."' and  `contact_info`='$contact_info' and `email_num`='$Email' ");
		if (mysqli_num_rows($checkQuery) > 0) {
		$errMSG = "This Lead Already Exist !";
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
			$stmt = $DB_con->prepare('INSERT INTO phone_book(user_id,category,lead_name,gender,org_name,position,address,contact_info,email_num,web_site,whatsapp,skype,facebook,linkedin,youtube,twitter,instagram,pinterest,comments,join_date,status,userPic) 
									VALUES(:user_id,:category, :name, :gender,:Company,:Position, :address,:contact_info,:Email,:Website,:WhatsApp,:Skype,:Facebook,:LinkedIn,:YouTube,:Twitter,:Instagram,:Pinterest,:comments,:Date,1,:upic)');
			$stmt->bindParam(':user_id',$user_id);
			$stmt->bindParam(':category',$category);
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':Company',$Company);
			$stmt->bindParam(':Position',$Position);
			
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':contact_info',$contact_info);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':Website',$Website);
			
			$stmt->bindParam(':WhatsApp',$WhatsApp);
			$stmt->bindParam(':Skype',$Skype);
			$stmt->bindParam(':Facebook',$Facebook);
			$stmt->bindParam(':LinkedIn',$LinkedIn);
			$stmt->bindParam(':YouTube',$YouTube);
			$stmt->bindParam(':Twitter',$Twitter);
			$stmt->bindParam(':Instagram',$Instagram);
			$stmt->bindParam(':Pinterest',$Pinterest);
			
			$stmt->bindParam(':comments',$comments);
			
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
			?>
                <script>
				alert('Successfully Add ...');
				window.location.href='lead-list';
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

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Lead |  <span> <a href="lead-list">    <i class="bi bi-table"></i> </a> </span> </h1>
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
	
   <tr style="display:none;">
    	<td><label class="control-label">User Id</label></td>
		<?php
				
				   
				   $pq=mysqli_query($con,"select * from  `user`   where  userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td><input class="form-control" type="text" name="user_id1"  value="<?php echo $pqrow['userid']; ?>" disabled="true" />
        <input class="form-control" type="hidden" name="user_id"  value="<?php echo $pqrow['userid']; ?>" /></td>
		<?php }?>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Category</label></td>
       	<td><select style="width:100%;" class="form-control chosen-select" Id="category" name="category" required="" >
		<option value="#">Select Category</option>
		
				      	<?php 
				      	$sql = "SELECT pb_cat_id,pb_cat_name FROM phnbook_category where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select>
		
		</td>
	</tr>
	
	<tr>
    	<td><label class="control-label"> Name  </label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Client Name"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Gender </label></td>
		<td><select style="width:100%;" class="form-control" name="gender"> <option>Male </option> <option>Female </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Company / Org </label></td>
        <td><input class="form-control" type="text" name="Company" placeholder="Company / Org"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><input class="form-control" type="text" name="Position" placeholder="Position" /></td>
    </tr>
	
	
     
	<tr>
    	<td><label class="control-label">Address </label></td>
       
        <td><input class="form-control" type="text" id="address" name="address" placeholder="Address:" value="<?php echo $address; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Phone </label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="Phone No..." value="<?php echo $contact_info; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">E-Mail </label></td>
        <td><input class="form-control" type="email" name="Email" placeholder="E-mail" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Website </label></td>
        <td><input class="form-control" type="text" name="Website" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> WhatsApp</label></td>
		<td><input class="form-control" type="text" name="WhatsApp" placeholder="WhatsApp Link Here" value="none"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Skype</label></td>
		<td><input class="form-control" type="text" name="Skype" placeholder="Skype Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Facebook</label></td>
		<td><input class="form-control" type="text" name="Facebook" placeholder="Facebook Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> LinkedIn</label></td>
		<td><input class="form-control" type="text" name="LinkedIn" placeholder="LinkedIn Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> YouTube</label></td>
		<td><input class="form-control" type="text" name="YouTube" placeholder="YouTube Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Twitter </label></td>
		<td><input class="form-control" type="text" name="Twitter" placeholder="Twitter Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Instagram</label></td>
		<td><input class="form-control" type="text" name="Instagram" placeholder="Instagram Link Here" value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Pinterest </label></td>
		<td><input class="form-control" type="text" name="Pinterest" placeholder="Pinterest Link Here"value="none" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Comments</label></td>
		<td><textarea class="form-control" name="comments" >Comments Here </textarea> </td>
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
	
		
	     
    </table>
	
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    
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