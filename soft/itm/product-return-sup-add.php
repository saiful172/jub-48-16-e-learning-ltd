
<?php require_once 'header.php'; ?>

<?php 
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$OrderId = $_POST['OrderId'];
		$Product_Id = $_POST['Product_Id']; 
		$BrandId = $_POST['BrandId']; 
		$CategoriesId = $_POST['CategoriesId']; 
		$Quantity = $_POST['Quantity'];
		$RetQty = $_POST['RetQty'];
		$RecQty = $_POST['RecQty'];
		$SaleRate = $_POST['SaleRate']; 
		$RetailRate = $_POST['RetailRate']; 
		$BuyRate = $_POST['BuyRate']; 
		$Date = $_POST['Date'];
		
				
		if(empty($Product_Id)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		
		else if(empty($RetQty)){
			$errMSG = "Please Enter RetQty.";
		}
		 
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_details (user_id,invoice_no,brand_id,categories_id,product_id, quantity,  add_qty, rec_qty,rate,retail_rate, buy_rate,entry_date,cuses,type) 
			                                               VALUES(:UserId,:OrderId,:BrandId,:CategoriesId,:Product_Id, :Quantity, :RetQty,:RecQty, :SaleRate, :RetailRate, :BuyRate, :Date,"Return-Sup",4 )');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':RetQty',$RetQty);
			$stmt->bindParam(':RecQty',$RecQty);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':RetailRate',$RetailRate);
			$stmt->bindParam(':BuyRate',$BuyRate); 
			$stmt->bindParam(':Date',$Date);
			 
			
			if($stmt->execute())
			{
				$successMSG = "Product Return Successfully...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
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
		$RecQty = $_POST['RecQty']; 
		$Date = $_POST['Date'];
			
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product 
									     SET quantity=:RecQty, 
										     last_update=:Date
											 
								       WHERE product_id=:Product_Id ');
			
			
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':RecQty',$RecQty); 
			$stmt->bindParam(':Date',$Date);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Product Return Successful');
				window.location.href='product-return-sup.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

</head>
<body>

<div class="container">
<center>  <h4><ol class="breadcrumb"> <li class="active"> Product Return - Supplier</li></ol></h4> </center> 


 <h1 class="h2"><a class="btn btn-success" href="product-return-sup.php"> <span class="glyphicon glyphicon-eye-open"></span> View </a>   
 </h1>    

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
	    
	<table class="table table-responsive">
	
	<tr>
    	
		<?php    
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Order / Invoice No</label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="OrderId" name="OrderId" required="" >
		<option value="#">Select Order / Invoice</option>
				      	<?php 
				      	$sql = "SELECT  distinct order_item.order_id,order_item.product_id,product.product_name,order_item.order_quantity FROM order_item
                        Left join product on product.product_id= order_item.product_id
						where product.user_id='".$_SESSION['id']."'
						order by order_item.order_id DESC limit 30 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]." - ".$row[1]." - ".$row[2]." - ".$row[3]."</option>";
								} 
				      	?>
		</select> 
		</td>
    </tr> 
	
	<tr>
    	<td><label class="control-label">Product Order / Invoice</label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="Product_Id" name="Product_Id" required="" >
		<option value="#">Select Order / Invoice</option>
				      	<?php 
				      	$sql = "SELECT  distinct order_item.order_id,order_item.product_id,product.product_name,order_item.order_quantity FROM order_item
                        Left join product on product.product_id= order_item.product_id
						where product.user_id='".$_SESSION['id']."'
						order by order_item.order_id DESC limit 30 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[1]."'>".$row[0]." - ".$row[1]." - ".$row[2]." - ".$row[3]."</option>";
								} 
				      	?>
		</select> 
		</td>
    </tr>
	 
	<tr>
    	<td><label class="control-label">Product Name</label></td>
        <td><input class="form-control" type="text" id="ProductName1" name="ProductName1" placeholder="Product Name" value="<?php echo $ProductName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="ProductName" name="ProductName" placeholder="product Name" value="<?php echo $ProductName; ?>" /></td>
	</tr>
	
 <tr>
    	<td><label class="control-label">Brand Name</label></td>
        <td><input class="form-control" type="text" id="BrandName1" name="BrandName1" placeholder="Brand Name" value="<?php echo $BrandName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="BrandId" name="BrandId" placeholder="Brand Id" value="<?php echo $BrandId; ?>" /></td>
   </tr>
   
   <tr style="">
    	<td><label class="control-label">Category Name</label></td>
        <td><input class="form-control" type="text" id="CategoriesName1" name="CategoriesName1" placeholder="Categories Name" value="<?php echo $CategoriesName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="CategoriesId" name="CategoriesId" placeholder="Categories Id " value="<?php echo $CategoriesId; ?>" /></td>
		
    </tr>
    
    <tr>
    	<td><label class="control-label">Quantity In Stock </label></td>
        <td><input class="form-control" type="text" id="Quantity1" name="Quantity1" placeholder="Quantity Number" value="<?php echo $Quantity; ?>" disabled="true" /> 
        <input class="form-control" type="hidden" id="Quantity" name="Quantity" placeholder="Quantity In Stock" value="<?php echo $Quantity; ?>" oninput="myFunctionTP()" /> </td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Return Quantity</label></td>
        <td><input class="form-control" type="text" id="RetQty" name="RetQty" placeholder="Return Quantity"  oninput="myFunctionTP()"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Recent Stock </label></td>
        <td><input class="form-control" type="text" id="TotalQuantity1" name="TotalQuantity1" placeholder=" Total Quantity" value="<?php echo $RecQty; ?>" disabled="true" oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="RecQty" name="RecQty" placeholder="Recent Quantity" value="<?php echo $RecQty; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	 
	
	<tr style="display:none;">
    	<td><label class="control-label">Sales Rate</label></td>
        <td><input class="form-control" type="text" id="SaleRate1"  name="SaleRate1" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>"  oninput="myFunctionTP()" oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Retail Rate</label></td>
        <td><input class="form-control" type="text" id="RetailRate1"  name="RetailRate1" placeholder="Retail Rate"  disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="RetailRate"  name="RetailRate" placeholder="Retail Rate"   oninput="myFunctionTP()" oninput="myFunctionTP()" /></td>
    </tr>
	
<!-- Total  Product -->		
 <script>
  function myFunctionTP() {
    var x = Number (document.getElementById("Quantity").value);
    var y = Number (document.getElementById("RetQty").value); 
	
    var z = Number (x - y); //RecQty 
    
    document.getElementById("TotalQuantity1").value = z;
    document.getElementById("RecQty").value = z;
	
     
	                  }
  </script>
	
	 
	<tr style="display:none;">
    	<td><label class="control-label">Buy Rate</label></td>
        <td><input class="form-control" type="text" id="BuyRate1" name="BuyRate1" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



</div>


<script>
	$("#Product_Id").on("change", function(){
		
		var productID = $("#Product_Id").val();
		if(productID == "")
		{
			alert("Please enter a valid product ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_stock.php?c=" + productID, success: function(result){
				var product = JSON.parse(result);
				$("#ProductName1").val(product.productName);
				$("#ProductName").val(product.productName);
				$("#BrandName1").val(product.brandId);
				$("#BrandId").val(product.brandId);
				$("#CategoriesName1").val(product.categoriesId);
				$("#CategoriesId").val(product.categoriesId);
				$("#Quantity1").val(product.productQty);
				$("#Quantity").val(product.productQty);
				
				$("#SaleRate1").val(product.saleRate);
				$("#SaleRate").val(product.saleRate);
				
				$("#RetailRate1").val(product.retailRate);
				$("#RetailRate").val(product.retailRate);
				 
				$("#BuyRate1").val(product.buyRate);
				$("#BuyRate").val(product.buyRate);
				
				 
				
				
			}});
		}
	});
</script>

<?php include('../includes/footer.php');?>