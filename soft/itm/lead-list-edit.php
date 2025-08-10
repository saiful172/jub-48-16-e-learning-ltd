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
		$stmt_edit = $DB_con->prepare('SELECT * FROM phone_book
        left join phnbook_category on phnbook_category.pb_cat_id=phone_book.category
		WHERE phone_book.lead_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: lead-list");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		 
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
			$stmt = $DB_con->prepare('UPDATE phone_book 
									     SET  
										     category=:category, 
										     lead_name=:name, 
										     gender=:gender,
										     org_name=:Company,
										     position=:Position, 
											 
										     address=:address, 
										     contact_info=:contact_info, 
										     email_num=:Email, 
										     web_site=:Website, 
										     
											 whatsapp=:WhatsApp,
											 skype=:Skype,
											 facebook=:Facebook,
											 linkedin=:LinkedIn,
											 youtube=:YouTube,
											 twitter=:Twitter,
											 instagram=:Instagram,
											 pinterest=:Pinterest,
											 
										     comments=:comments, 
										      
										     status=:status, 
											 
										     userPic=:upic 
								       WHERE lead_id=:uid');
			 
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
			$stmt->bindParam(':status',$status); 
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='lead-list';
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
      <h1> Lead Update </h1> <hr>
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
    	<td><label class="control-label">Category</label></td>
       	<td><select style="width:100%;" class="form-control" name="category"> 
		<option value="<?php echo $pb_cat_id; ?>"><?php echo $pb_cat_name; ?></option>  
		       <?php 
				      	$sql = "SELECT  pb_cat_id,pb_cat_name FROM phnbook_category where user_id='".$_SESSION['id']."'";
								$result = $con->query($sql); 
								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
						?>
		
		</select> </td>       
	</tr>	
	
	<tr>
    	<td><label class="control-label"> Name</label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $lead_name; ?>" /></td>
    </tr> 
	
	<tr>
    <td><label class="control-label">Gender</label></td>
		<td><select style="width:100%;" class="form-control" name="gender" value="<?php echo $gender; ?>" > <option>Male</option> <option>Female </option> </select> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Company / Org </label></td>
        <td><input class="form-control" type="text" name="Company" placeholder="Company / Org"  value="<?php echo $org_name; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Position</label></td>
        <td><input class="form-control" type="text" name="Position" placeholder="Position" value="<?php echo $position; ?>" /></td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Address</label></td>
        <td><input class="form-control" type="text" name="address" placeholder="address" value="<?php echo $address; ?>" /></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Phone No</label></td>
        <td><input class="form-control" type="text" name="contact_info" placeholder="contact_info" value="<?php echo $contact_info; ?>" /></td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">E-Mail </label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="E-mail" value="<?php echo $email_num; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Website </label></td>
        <td><input class="form-control" type="text" name="Website" placeholder="Website" value="<?php echo $web_site; ?>" /></td>
    </tr> 

	
	
	
	<tr>
    	<td><label class="control-label"> WhatsApp</label></td>
		<td><input class="form-control" type="text" name="WhatsApp" value="<?php echo $whatsapp; ?>" /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label"> Skype</label></td>
		<td><input class="form-control" type="text" name="Skype" value="<?php echo $skype; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Facebook</label></td>
		<td><input class="form-control" type="text" name="Facebook" value="<?php echo $facebook; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> LinkedIn</label></td>
		<td><input class="form-control" type="text" name="LinkedIn" value="<?php echo $linkedin; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> YouTube</label></td>
		<td><input class="form-control" type="text" name="YouTube" value="<?php echo $youtube; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Twitter </label></td>
		<td><input class="form-control" type="text" name="Twitter" value="<?php echo $twitter; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Instagram</label></td>
		<td><input class="form-control" type="text" name="Instagram" value="<?php echo $instagram; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Pinterest </label></td>
		<td><input class="form-control" type="text" name="Pinterest" value="<?php echo $pinterest; ?>"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Comments</label></td>
		<td><textarea class="form-control" name="comments" ><?php echo $comments; ?></textarea> </td>
    </tr>
	
	 
	
    <tr>
    	<td><label class="control-label">Active/In Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In Active</option>
		</select> </td>       
	</tr>
	
		
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
     
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="lead-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>