<?php require_once 'header.php'; ?>

<?php 
	if(isset($_POST['btnsave']))
	{
		$Product_Id = $_POST['Product_Id'];
		$ProductName = $_POST['ProductName'];
		$BrandId = $_POST['BrandId'];
		$CategoriesId = $_POST['CategoriesId'];
		$Quantity = $_POST['Quantity'];
		$SaleRate = $_POST['SaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate'];
		$TotalSaleRate = $_POST['TotalSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRate = $_POST['TotalBuyRate'];
		$TotalIncome = $_POST['TotalIncome'];
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
			$stmt = $DB_con->prepare('INSERT INTO product (product_id,product_name,product_image, brand_id, categories_id, quantity,rate,retail_rate,total_rate, buy_rate, total_buy_rate, total_income,active,status, entry_date,last_update) 
			        VALUES(:Product_Id,:ProductName,:upic, :BrandId, :CategoriesId, :Quantity, :SaleRate,:ReatilSaleRate, :TotalSaleRate,:BuyRate, :TotalBuyRate, :TotalIncome, 1,1, :Date, :Date )');
			
			
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':ProductName',$ProductName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate);
			$stmt->bindParam(':TotalSaleRate',$TotalSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRate',$TotalBuyRate);
			$stmt->bindParam(':TotalIncome',$TotalIncome);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "New Product Add Succesfully...";
				//header("refresh:2; customer.php"); // redirects image view page after 5 seconds.
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
		
		$Product_Id = $_POST['Product_Id'];
		$ProductName = $_POST['ProductName'];
		$BrandId = $_POST['BrandId'];
		$CategoriesId = $_POST['CategoriesId'];
		$Quantity = $_POST['Quantity'];
		$SaleRate = $_POST['SaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate'];
		$TotalSaleRate = $_POST['TotalSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRate = $_POST['TotalBuyRate'];
		$TotalIncome = $_POST['TotalIncome'];
		
		$Date = $_POST['Date'];
		
				
		if(empty($ProductName)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		
		else if(empty($Quantity)){
			$errMSG = "Please Enter Quantity .";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_details (admin_id,user_id,product_id,product_name,brand_id,categories_id,quantity,add_qty,total_qty,total_qty_price,rate,retail_rate,total_rate,buy_rate,total_buy_rate,total_income,cuses,entry_date) 
			                                               VALUES(22,22,:Product_Id,:ProductName,:BrandId,:CategoriesId,0,:Quantity,:Quantity,0,:SaleRate,:ReatilSaleRate,:TotalSaleRate,:BuyRate,:TotalBuyRate,:TotalIncome,"Admin Stock",:Date)');
			
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':ProductName',$ProductName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate);
			$stmt->bindParam(':TotalSaleRate',$TotalSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRate',$TotalBuyRate);
			$stmt->bindParam(':TotalIncome',$TotalIncome);
			
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				$successMSG = "New Product Add Successfully...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
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
<center>  <h4><ol class="breadcrumb"> <li class="active"> Product Add </li></ol></h4> </center> 


 <h1 class="h2">
 <a class="btn btn-default" href="product_add.php"> <span class="glyphicon glyphicon-plus"></span> Add New </a>   
<a class="btn btn-default" href="productN.php"> <span class="glyphicon glyphicon-eye-open"></span> View Product </a>   </h1>  
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
    	<td><label class="control-label">Product Code</label> </td>
        <td> 
			<?php 
				   $pq=mysqli_query($con,"select MAX(product_id)+1 as product_id from  `product` ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  
		<input  type="text" class="form-control" id="Product_Id11" name="Product_Id11" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" disabled="true" >  
		<input  type="hidden" class="form-control" id="Product_Id" name="Product_Id" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" >  
		 <?php }?>
		</td>
    </tr>
	
  <tr>
     <td><label class="control-label">Product Name</label></td>
     <td><input class="form-control" type="text" id="ProductName" name="ProductName" placeholder="Product Name" value="" /></td>
  </tr>
	
   <tr style="display:none;">
    <td><label class="control-label">Brand Name</label></td>
    <td><input class="form-control" type="text" id="BrandId" name="BrandId" placeholder="Brand Id" value="0" /> </td>
   </tr>
   
   <tr style="display:none;">
    	<td><label class="control-label">Category Name</label></td>
        <td><input class="form-control" type="text" id="CategoriesId" name="CategoriesId" placeholder="Categories Id " value="0" /></td>
   </tr>
    
    <tr>
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="" oninput="myFunctionTP()" /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Sales Rate</label></td>
        <td>
       <input class="form-control" type="text" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value=""  oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Retail Sale Rate</label></td>
        <td> <input class="form-control" type="text" id="ReatilSaleRate"  name="ReatilSaleRate" placeholder="Reatil Sale Rate" value="0.00"  oninput="myFunctionTP()" /></td>
    </tr>
<!-- Total  Product -->		
 
<script>
  function myFunctionTP() {
    var x = Number (document.getElementById("Quantity").value);
    var y = Number (document.getElementById("SaleRate").value);
    var x1 = Number (document.getElementById("BuyRate").value);
	
    var z = Number (y * x); //total Sale rate
    var z1 = Number (x * x1); //totalbuyrate
    var z2 = Number (z - z1); //totalincome
    
    document.getElementById("TotalSaleRate").value = z;
    document.getElementById("TotalBuyRate").value = z1;
    document.getElementById("TotalIncome").value = z2;
	
	                  }
  </script>
  
	<tr>
    	<td><label class="control-label">Total Sales Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalSaleRate" name="TotalSaleRate" placeholder="Total Sale Rate" value=""  /></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="" oninput="myFunctionTP()" /></td>
    </tr>
	
   <tr>
    	<td><label class="control-label">Total Buy Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalBuyRate" name="TotalBuyRate" placeholder="TotalBuyRate Money" value=""  oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Total Income</label></td>
        <td>
        <input class="form-control" type="text" id="TotalIncome" name="TotalIncome" placeholder="Total Income" value=""  oninput="myFunctionTP()"  /></td>
    </tr>
	

<tr>
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
</form>

</div>

<?php include('../includes/footer.php');?>
