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
		$UserId = $_POST['UserId'];
		$ShopType = $_POST['ShopType'];
		$ShopName = $_POST['ShopName'];
		$ShopNumber = $_POST['ShopNumber'];
		$Floor = $_POST['Floor'];
		$OwnerName = $_POST['OwnerName'];
		$Tenant = $_POST['Tenant'];
		
		$address = $_POST['address'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Nid = $_POST['Nid'];
		
		$Rent = $_POST['Rent'];
		$Electric = $_POST['Electric'];
		$Service = $_POST['Service']; 
		$TotalBill = $_POST['TotalBill'];
		
		 
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($ShopName)){
			$errMSG = "Please Enter Employee Name.";
		}
		else if(empty($address)){
			$errMSG = "Please Enter address.";
		}
		
		else if(empty($address)){
			$errMSG = "Please Enter address.";
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
			$stmt = $DB_con->prepare('INSERT INTO shop (user_id,shop_type,shop_name,shop_number,floor_number,owner,tenant,address,phone,email,national_id,shop_rent,elec_bill,serv_charge,total_bill,join_date,status,userPic)
													  VALUES(:UserId,:ShopType,:ShopName,:ShopNumber,:Floor,:OwnerName,:Tenant,:address,:Phone,:Email,:Nid,:Rent,:Electric,:Service,:TotalBill,:Date,1,:upic)');
			
		    $stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':ShopType',$ShopType);
			$stmt->bindParam(':ShopName',$ShopName);
			$stmt->bindParam(':ShopNumber',$ShopNumber);
			$stmt->bindParam(':Floor',$Floor);
			$stmt->bindParam(':OwnerName',$OwnerName);
			$stmt->bindParam(':Tenant',$Tenant);
			
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Email',$Email);
			$stmt->bindParam(':Nid',$Nid);
			
			$stmt->bindParam(':Rent',$Rent);
			$stmt->bindParam(':Electric',$Electric);
			$stmt->bindParam(':Service',$Service);
			$stmt->bindParam(':TotalBill',$TotalBill);
			 
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
			?>
                <script>
				alert('New Shop Add Successful...');
				window.location.href='shop-list';
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Shop |  <span> <a href="shop-list">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
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
	    
	
	 
<div class="row"> 
	<div class="col-lg-6">	
<table class="table table-hover table-responsive">
   <tr>
    	
		<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
  <tr style="display:none;">
	         <?php	//  একই সাথে   employees_salary ..এ  ডাটা পাঠানোর জন্য //
				  
				   $pq=mysqli_query($con,"select MAX(id)+1 as max_id from employees ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
      
      <td>   <input class="form-control" type="text" name="EmpId"  value="<?php echo $pqrow['max_id']; ?>"  /> </td>
      <?php }?>
	  
	</tr>
	
	 <tr>
    	<td><label class="control-label"> Shop Type </label></td>
        <td>
		<select style="width:100%;" class="form-select chosen-select" id="ShopType" name="ShopType" value="<?php echo $ShopType; ?>" required>
		<option value="">Select Type</option>
		<option value="Personal">Personal</option>
		<option value="Rental">Rental</option>
				      	 
		</select>
		</td>
   </tr>
		
	<tr>
    	<td><label class="control-label">Shop Name</label></td>
        <td><input class="form-control" type="text" name="ShopName" placeholder="Shop Name" value="<?php echo $ShopName; ?>" required></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Shop Number</label></td>
        <td><input class="form-control" type="text" name="ShopNumber" placeholder="Shop Number" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Floor / Level Number</label></td>
        <td><input class="form-control" type="text" name="Floor" placeholder="Floor / Level Number" required></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Owner Name </label></td>       
        <td><input class="form-control" type="text" id="OwnerName" name="OwnerName" placeholder="Owner Name"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Tenant Name </label></td>       
        <td><input class="form-control" type="text" id="Tenant" name="Tenant" placeholder="Tenant Name"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Address </label></td>       
        <td><input class="form-control" type="text" id="address" name="address" placeholder="Address"   /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No.</label></td>
        <td><input class="form-control" type="text" name="Phone" placeholder="Mobile No."  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Email</label></td>
        <td><input class="form-control" type="text" name="Email" placeholder="Email" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> National ID Card </label></td>
        <td><input class="form-control" type="text" name="Nid" placeholder="National ID Card "  /></td>
    </tr>
  </table>
  
</div> 

<div class="col-lg-6"> 

 <table class="table table-hover table-responsive">
	
	<tr>
    	<td><label class="control-label">Monthly Rent</label></td>
        <td><input class="form-control" type="text" name="Rent" id="Rent"  placeholder="Monthly Rent"  oninput="myFunction()" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Electric Bill</label></td>
        <td><input class="form-control" type="text" name="Electric" id="Electric"  placeholder="Electric Bill" oninput="myFunction()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Service Charge</label></td>
        <td><input class="form-control" type="text" name="Service" id="Service" placeholder="Service Charge" oninput="myFunction()" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Total Bill</label></td>
        <td><input class="form-control" type="text" name="TotalBill" id="TotalBill" placeholder="Total Bill"  /></td>
    </tr>
	
	<script>
  function myFunction() {
    var gs = Number (document.getElementById("Rent").value);
    var hr = Number (document.getElementById("Electric").value);
    var ma = Number (document.getElementById("Service").value); 
	
	var z = Number (gs + hr + ma);  

    document.getElementById("TotalBill").value = z; 
	                  }
  </script> 
  
	
	<tr>
    	<td><label class="control-label">Date  </label></td>
		<td><input class="form-control" type="Date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Photo  </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /> Photo Size Width=300px X Height=320px (JPG or PNG) </td>
    </tr>
	
    
    </table>
	
	<div class="text-center">
	 <button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
	</div>

</div>	
</div>  

</form>

            </div>
          </div>

          
        </div>
        </div> 

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>