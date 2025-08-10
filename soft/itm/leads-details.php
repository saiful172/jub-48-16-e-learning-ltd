<?php require_once 'header.php'; ?>
<?php  
	if(isset($_GET['view']) && !empty($_GET['view']))
	{
		$id = $_GET['view'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM phone_book
        left join phnbook_category on phnbook_category.pb_cat_id=phone_book.category
		WHERE phone_book.lead_id =:uid');
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
				window.location.href='leads-edit';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> .social .fa {font-size:17px;}</style>
<link rel="stylesheet" href="css/buttons.css">  
</head>
<body>

 
<center><h4><ol class="breadcrumb"> <li class="active">Lead Details</li></ol></h4></center>
 
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads"> <span class="glyphicon glyphicon-user"></span> Lead List</a> 
</div>

<div class="col-md-12">	
<a class="btn btn-success  btn-w100" href="lead-list-report"> <span class="glyphicon glyphicon-file"></span> Report</a> 
</div>
	

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-warning btn-w100" href="leads-cat"> <span class="glyphicon glyphicon-list"></span> Leads Category</a>
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="follow"> <span class="glyphicon glyphicon-user"></span> Follow Up</a>
</div>
       
	</div>
	</div>

	
<div class="col-md-10"> 
<div class="col-md-8"> 
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
   
    
	<table class="table table-responsive">
	 
	
	<tr>
    	<td><label class="control-label">Category</label></td>
		<td> <?php echo $pb_cat_name; ?> </td>
           
	</tr>	
	
	<tr>
    	<td><label class="control-label"> Name</label></td>
		<td> <?php echo $lead_name; ?> </td>
	</tr> 
	
	<tr> 
    <td><label class="control-label">Gender</label></td>
	<td> <?php echo $gender; ?> </td>
	</tr>
	
	<tr>
    	<td><label class="control-label"> Company / Org </label></td>
		<td> <?php echo $org_name; ?> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Position</label></td>
		<td> <?php echo $position; ?> </td>
    </tr>
    
	
	
	<tr>
    	<td><label class="control-label">Address</label></td>
		<td> <?php echo $address; ?> </td>
  </tr>
	
		
	<tr>
    	<td><label class="control-label">Phone No</label></td>
		<td> <?php echo $contact_info; ?> </td>
     </tr> 
	
	<tr>
    	<td><label class="control-label">E-Mail </label></td>
		<td> <?php echo $email_num; ?> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Website </label></td>
		<td> <a target="_blank" href="<?php echo $web_site; ?>"><i class="fa fa-globe btn-sm"></i> <?php echo $web_site; ?></a> </td>
    </tr> 

	
	<tr>
    	<td><label class="control-label"> Social Media </label></td> 
		
		<td class="social"> 
											<a style="display:<?php echo $whatsapp; ?>;" target="_blank" href="<?php echo $whatsapp; ?>"><i class="fa fa-whatsapp btn-sm"></i></a>
											<a style="display:<?php echo $skype; ?>;" target="_blank" href="<?php echo $skype; ?>"><i class="fa fa-skype btn-sm"></i></a>
											<a style="display:<?php echo $facebook; ?>;" target="_blank" href="<?php echo $facebook; ?>"><i class="fa fa-facebook btn-sm"></i></a>
											<a style="display:<?php echo $twitter; ?>;" target="_blank" href="<?php echo $twitter; ?>"><i class="fa fa-twitter btn-sm"></i></a>
											<a style="display:<?php echo $linkedin; ?>;" target="_blank" href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin btn-sm"></i></a>
											<a style="display:<?php echo $youtube; ?>;" target="_blank" href="<?php echo $youtube; ?>"><i class="fa fa-youtube btn-sm"></i></a>
											<a style="display:<?php echo $instagram; ?>;" target="_blank" href="<?php echo $instagram; ?>"><i class="fa fa-instagram btn-sm"></i></a>
											<a style="display:<?php echo $pinterest; ?>;" target="_blank" href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest btn-sm"></i></a>
       </td>
    </tr>
	 
	<tr>
    	<td><label class="control-label"> Comments</label></td>
		<td><?php echo $comments; ?> </td>
    </tr>
	 
	
    <tr>
    	<td><label class="control-label">Photo </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        </td>
    </tr>
    
       
    </table>
	
	<tr>
        <td colspan="2">
        <a class="btn btn-danger" href="leads"> <span class="glyphicon glyphicon-backward"></span> Back </a>
        </td>
     </tr>
    
</form>
 
 </div>
 <div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>
 