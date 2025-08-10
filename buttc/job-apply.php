<?php
	require_once 'admin/admin/includes/dbconfig.php';  
	error_reporting( ~E_NOTICE );
	 
	if(isset($_POST['btnsave']))
	{  
		$Name = $_POST['Name'];  
		$Email = $_POST['Email']; 
		$Phone = $_POST['Phone']; 
		$Position = $_POST['Position'];  
		
		$Date = $_POST['Date']; 
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($Name)){
			$errMSG = "Please Enter First Name.";
		}
		
		
		else
		{
			$upload_dir = 'admin/admin/user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'docx', 'pdf'); // valid extensions
		
			// rename uploading image
			//$userpic = rand(1000,1000000).".".$imgExt;
			$userpic ="e-learn-".$imgFile;
				
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
			 
		}
		
		
		 
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO job_info (user_id,name,email,phone,position,entry_date,userPic) 
															VALUES(22,:Name,:Email,:Phone,:Position,:Date,:upic)');
			
			 
			$stmt->bindParam(':Name',$Name);
			$stmt->bindParam(':Email',$Email); 
			$stmt->bindParam(':Phone',$Phone); 
			$stmt->bindParam(':Position',$Position); 
			
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Apply Successful');
				window.location.href='job-apply.php';
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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

 <?php include('link.php'); ?> 
 
</head>

<body>

  <!-- ======= Header ======= -->
<?php include('header.php'); ?> 
  <!-- End Header -->

  <main id="main">
 
    <section id="contact" class="contact">
      <div class="container">
	  
	  <div class="col-lg-12 text-center mt-4"> 
           <br><br> <h3>Apply Now</h3> <hr>
          </div>
    
        
		
		<!--
		<div class="row mt-5 justify-content-center" data-aos="fade-up"> 
           <div class="col-lg-12">
	         <div class="map-section">
             <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
             </div>
           </div>
        </div>
		-->

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-12">
		  
            <form method="post" enctype="multipart/form-data" >
             
			 <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Name" id="Name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
				<div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Your Phone Number" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
	             <select id="Position" name="Position" class="form-control">
                <option value="#">Select Position</option>
                <option value="CRM (Female)">Customer Relationship Executive / Manager (CRM) (Female)</option> 
				<option value="SEO Expert">SEO Expert</option> 
				<option value="Head Of Marketing - Freelancing">Head Of Marketing / Senior Executive ( Freelancing / Outsourcing)</option> 
				<option value="Head of Training-IT">Head of Training / Senior Executive (IT)</option> 
				<option value="Head of Training (Language)">Head of Training / Senior Executive (Language)</option> 
	            <option value="Video Editor">Video Editor</option> 
				<option value="Motion Graphics Executive">Motion Graphics Executive</option> 
				 
                 </select>
                <div class="validate"></div>
                </div>
				
              </div>
			   
			   
			   <div class="form-group" style="display:none;">
				<input type="text" name="Date" class="form-control" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>"  />
				</div>
						
				<div class="form-group">
				<label for="">Please Upload Resume (PDF File) Here : </label>
                <input type="file"  name="user_image">
                <div class="validate"></div>
              </div> 
			   
             <div class="text-center"><button class="btn-get-started" name="btnsave" type="submit" >Apply</button></div>
            
			</form>
          </div>

        </div> 
       
    </div>
	  
	</section> 

  </main> 

  <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>
  <!-- End Footer -->
   
  