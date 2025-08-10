<?php require_once 'header.php'; ?>

<?php 
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId']; 
		$ProductName = $_POST['ProductName']; 
		$Quantity = $_POST['Quantity'];
		$WholSaleRate = $_POST['WholSaleRate']; 
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		if(empty($ProductName)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		
		else if(empty($Quantity)){
			$errMSG = "Please Enter Quantity .";
		}
		
		else
		{
			$upload_dir = 'assests/images/stock/'; // upload directory
	
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
			$stmt = $DB_con->prepare('INSERT INTO product (user_id,product_name,product_image, quantity,rate,entry_date) 
			        VALUES(:UserId,:ProductName,:upic, :Quantity,:WholSaleRate,:Date )');
			
			
			$stmt->bindParam(':UserId',$UserId); 
			$stmt->bindParam(':ProductName',$ProductName); 
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':WholSaleRate',$WholSaleRate); 
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
			?>
                <script>
				alert('Data Successfully Add ...');
				window.location.href='productN.php';
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
<center>  <h4><ol class="breadcrumb"> <li class="active"> Service / Product Add </li></ol></h4> </center> 


 <h1 class="h2">
 <a class="btn btn-primary" href="productAdd"> <span class="glyphicon glyphicon-plus"></span> Add New </a>   
<a class="btn btn-success" href="productN"> <span class="glyphicon glyphicon-eye-open"></span> View </a>   </h1>  
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
	    
	<table class="table table-hover table-responsive">
	
 <tr>
    	
		<?php
				
				   
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	 
	
  <tr>
     <td><label class="control-label">Service / Product Name</label></td>
     <td><input class="form-control" type="text" id="ProductName" name="ProductName" placeholder="Product Name" value="" /></td>
  </tr>
	 
    <tr style="display:none;">
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="10" oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="" oninput="myFunctionTP()" /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Whole Sale Rate</label></td>
        <td>
       <input class="form-control" type="text" id="WholSaleRate"  name="WholSaleRate" placeholder="Whole Sale Rate"  oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Retail Sale Rate</label></td>
        <td> <input class="form-control" type="text" id="ReatilSaleRate"  name="ReatilSaleRate" placeholder="Reatil Sale Rate" value=""  oninput="myFunctionTP()" /></td>
    </tr>
	
 

  <tr style="display:none;">
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
	<tr style="display:none;">
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr> <td></td>  <td></td></tr>
    
    </table>
	
	 <button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
	
</form>

</div>

<?php include('../includes/footer.php');?>
