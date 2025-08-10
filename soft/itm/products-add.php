<?php require_once 'header.php'; ?>

<?php 
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
        $SubCatId = $_POST['SubCatId'];
		$BrandId = $_POST['BrandId'];		
		$Category = $_POST['Category'];		
		$ProductName = $_POST['ProductName']; 
		$Details = $_POST['Details'];  
		$Wrnty = $_POST['Wrnty'];  
		$Quantity = $_POST['Quantity'];  
		$WholSaleRate = $_POST['WholSaleRate']; 
		$ReatilSaleRate = $_POST['ReatilSaleRate']; 
		$BuyRate = $_POST['BuyRate']; 
		$Date = $_POST['Date'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		if(empty($ProductName)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		
		else if(empty($Details)){
			$errMSG = "Please Enter Details .";
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
			$stmt = $DB_con->prepare('INSERT INTO product  (user_id,brand_id, categories_id,sub_cat,product_name,product_details,warranty,product_image, quantity,rate,retail_rate,buy_rate,active,status, entry_date,last_update) 
			        VALUES(:UserId,:BrandId,:Category,:SubCatId,:ProductName,:Details,:Wrnty,:upic, :Quantity, :WholSaleRate,:ReatilSaleRate,:BuyRate,1,1,:Date,:Date )');
			 
			$stmt->bindParam(':UserId',$UserId); 
			$stmt->bindParam(':SubCatId',$SubCatId);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':Category',$Category);
			$stmt->bindParam(':ProductName',$ProductName); 
			$stmt->bindParam(':Details',$Details);  
			$stmt->bindParam(':Wrnty',$Wrnty);  
			$stmt->bindParam(':Quantity',$Quantity);  
			$stmt->bindParam(':WholSaleRate',$WholSaleRate); 
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate); 
			$stmt->bindParam(':BuyRate',$BuyRate); 
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
			
			$successMSG = "New Product Add Successful...";
			
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
		$UserId = $_POST['UserId'];
		$SubCatId = $_POST['SubCatId'];
		$BrandId = $_POST['BrandId'];
		$Category = $_POST['Category'];
		$Product_Id = $_POST['Product_Id'];
		$Quantity = $_POST['Quantity']; 
		$WholSaleRate = $_POST['WholSaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$Date = $_POST['Date'];
		
				
		if(empty($Product_Id)){
			$errMSG = "Please Enter Product Id.";
		}
		
		else if(empty($Details)){
			$errMSG = "Please Enter Details .";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_details (user_id,invoice_no,brand_id,categories_id,sub_cat,product_id,quantity,add_qty,rec_qty,rate,retail_rate,buy_rate,entry_date,cuses,type) 
			                                               VALUES(:UserId,"0",:BrandId,:Category,:SubCatId,:Product_Id,"0",:Quantity,:Quantity,:WholSaleRate,:ReatilSaleRate,:BuyRate,:Date,"New Add",1)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':SubCatId',$SubCatId);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':Category',$Category);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':Quantity',$Quantity); 
			$stmt->bindParam(':WholSaleRate',$WholSaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
                <script>
				alert('Product Add Successfully.');
				window.location.href='products-add'; 
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

 
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Product </title>  
 <!--<script src="js/cat_sub_cat_brand.js"></script>-->

<script type="text/javascript">
$(document).ready(function(){
    $('#BrandId').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'brand_id='+countryID,
                success:function(html){
                    $('#Category').html(html);
                    $('#SubCatId').html('<option value="">Select Category First</option>'); 
                }
            }); 
        }else{
            $('#Category').html('<option value="">Select Brand First</option>');
            $('#SubCatId').html('<option value="">Select Category First</option>'); 
        }
    });
    $('#Category').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'cat_id='+stateID,
                success:function(html){
                    $('#SubCatId').html(html);
                }
            }); 
        }else{
            $('#SubCatId').html('<option value="">Select Category First</option>'); 
        }
    });
});
</script>

<link rel="stylesheet" href="css/buttons.css"> 
</head>
<body>
<center>  <h4><ol class="breadcrumb"> <li class="active"> Product Add </li></ol></h4> </center> 

<div class="col-md-2">  
<div class="buttons"> 
	  
	  <div class="col-md-12">
			<a class="btn btn-primary btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product List  </a> 
	   </div>
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/view-product-stock" class="btn btn-success btn-w100 "> <i class="fa fa-file"></i>  Stock Report </a>
		</div>
		
		

		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print </a>
		</div>
		
		<div class="col-md-12">
			<br>
		</div>
		
	
		
	<div class="col-md-12">
			<a class="btn btn-info btn-w100" href="category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="sub-category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Sub Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="brands"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Brands  </a> 
	   </div>
	   
	   
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN-history"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product History  </a> 
	   </div>
		 
		
	</div>
	
  
</div>

<div class="col-md-10">	 
<div class="col-md-7">  
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
	
	
	<tr style="display:none;">
    	<td><label class="control-label">Product Code</label> </td>
        <td> 
			<?php 
				   $pq=mysqli_query($con,"select MAX(product_id)+1 as product_id from  `product` where user_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  
		<input  type="text" class="form-control" id="Product_Id11" name="Product_Id11" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" disabled="true" >  
		<input  type="hidden" class="form-control" id="Product_Id" name="Product_Id" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" >  
		 <?php }?>
		</td>
    </tr>
	
 <tr>
    	<td><label class="control-label">Brand Name</label></td>
        <td>
		<?php 
	$query = $con->query("SELECT * FROM brand1  where user_id='".$_SESSION['id']."' ORDER BY brand_name ASC");
	$rowCount = $query->num_rows;
	?>
	
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId" required=""/>
		<option value="#">Select Brand</option>
				      	<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
				}
			}else{
				echo '<option value="">Brand Not Available</option>';
			}
			?>
		</select>
		</td>
   </tr>
   
   <tr>
    	<td><label class="control-label"> Category </label></td>
        <td>
		<select style="width:100%;" class="form-control" Id="Category" name="Category"  required=""/>
		<option value="">Select Category</option>
				   
		</select>
		</td>
   </tr>
	
   <tr>
    <td><label class="control-label">Sub Category Name</label></td>
	 <td>
	 <select style="width:100%;" class="form-control" Id="SubCatId" name="SubCatId" >
		<option value="">Select Sub Category</option>
				      
		</select>
	</td>
   </tr>
 
  <tr>
     <td><label class="control-label">Product Name  </label></td>
     <td><input class="form-control" type="text" id="ProductName" name="ProductName" placeholder="Product Name"  /></td>
  </tr>
  
    <tr>
    	<td><label class="control-label">Short Details</label></td>
        <td>
       <input class="form-control" type="text" id="Details"  name="Details" placeholder="Short Details"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Warranty</label></td>
        <td>
       <input class="form-control" type="text" id="Wrnty"  name="Wrnty" placeholder="Product Warranty"  /></td>
    </tr>
	 
    <tr style="display:none;">
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="0"   /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value=""  /></td>
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
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>


